class Prescription < ActiveRecord::Base
	belongs_to :user
	has_many :plogs
	validates :illness, presence: true
	validates :name, presence: true
	validates :text, presence: true
	validates :manipulated, presence: true
	validates :user_id, presence: true, numericality: { only_integer: true }
end
