# Read about factories at https://github.com/thoughtbot/factory_girl

FactoryGirl.define do
  factory :patient do
    name "MyString"
    phones "MyString"
    email "MyString"
    user_id 1
    health_plan "MyString"
    health_plan_code "MyString"
    home_address "MyString"
  end
end
