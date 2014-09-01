class Patient < ActiveRecord::Base
	belongs_to :user
	validates :name, presence: true
	validates :user_id, presence: true, numericality: { only_integer: true }

	has_many :plogs, dependent: :destroy
	has_many :elogs, dependent: :destroy
	has_many :prescriptions, through: :plogs
	has_many :exams, through: :elogs
end
