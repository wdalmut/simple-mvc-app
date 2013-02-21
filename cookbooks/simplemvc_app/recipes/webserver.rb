#
# Cookbook Name:: simplemvc_app
# Recipe:: webserver
#

app_name = 'simplemvc_app'
app_config = node[app_name]
#app_secrets = Chef::EncryptedDataBagItem.load("secrets", app_name) 

include_recipe "apt"
include_recipe "apache2"
include_recipe "apache2::mod_php5" 

package "curl"
package "git"

# Set up the Apache virtual host 
web_app app_name do 
  server_name app_config['server_name']
  docroot app_config['docroot']
  #server_aliases [node['fqdn'], node['hostname']]
  template "#{app_name}.conf.erb" 
  log_dir node['apache']['log_dir'] 
end

database = "blogdb"
execute "mysql-install-database" do
  command "\"#{node['mysql']['mysql_bin']}\" -u root #{node['mysql']['server_root_password'].empty? ? '' : '-p' }\"#{node['mysql']['server_root_password']}\" < \"/vagrant/resources/database.sql\""
end
cron "mysql-dump-database" do
  minute "30"
  command "mysqldump -u root #{node['mysql']['server_root_password'].empty? ? '' : '-p' }\"#{node['mysql']['server_root_password']}\" --databases #{database} > \"/vagrant/resources/database-dump.sql\""
end
