class Prescription < ActiveRecord::Base
	belongs_to :user
	has_many :plogs, foreign_key: :prescription_id, dependent: :destroy
	validates :illness, presence: true
	validates :name, presence: true
	validates :text, presence: true
	validates :manipulated, presence: true
	validates :user_id, presence: true, numericality: { only_integer: true }
end
