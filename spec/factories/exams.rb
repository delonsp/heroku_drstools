# Read about factories at https://github.com/thoughtbot/factory_girl

FactoryGirl.define do
  factory :exam do
    name "MyString"
    text "MyText"
    user_id 1
  end
end
