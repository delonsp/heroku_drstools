class UserConfig < ActiveRecord::Base
	belongs_to :user
	validates :crm, presence: true
	validates :user_data, presence: true
	validates :places, presence: true
	validates :user_id, presence: true, numericality: { only_integer: true }
end


# t.integer  "user_id"
#     t.string   "name"
#     t.string   "email"
#     t.string   "crm"
#     t.boolean  "send_email"
#     t.text     "emails_to_send"
#     t.text     "user_data"
#     t.text     "places"
#     t.datetime "created_at"
#     t.datetime "updated_at"
# just validates the presence of crm, places and user_data, the rest can be imported from user