# Read about factories at https://github.com/thoughtbot/factory_girl

FactoryGirl.define do
  factory :prescription do
    illness "MyString"
    name "MyString"
    text "MyText"
    manipulated false
    user_id 1
  end
end
