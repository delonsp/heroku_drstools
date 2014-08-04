# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the rake db:seed (or created alongside the db with db:setup).
#
# Examples:
#
#   cities = City.create([{ name: 'Chicago' }, { name: 'Copenhagen' }])
#   Mayor.create(name: 'Emanuel', city: cities.first)
User.destroy_all
user = CreateAdminService.new.call
puts "CREATED ADMIN USER: first_name: #{user.first_name}, last_name: #{user.last_name}, email: #{user.email}"
