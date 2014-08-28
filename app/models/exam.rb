class Exam < ActiveRecord::Base
	belongs_to :user
	has_many :elogs
	validates :name, presence: true
	validates :text, presence: true
	validates :user_id, presence: true, numericality: { only_integer: true }

end
