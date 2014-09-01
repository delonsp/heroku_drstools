# Read about factories at https://github.com/thoughtbot/factory_girl

FactoryGirl.define do
  factory :user_config do
    user_id 1
    name "MyString"
    email "MyString"
    crm "MyString"
    send_email false
    emails_to_send "MyText"
    user_data "MyText"
    places "MyText"
  end
end
