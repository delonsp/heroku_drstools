class Plog < ActiveRecord::Base
	belongs_to :patient
	belongs_to :prescription
	validates :prescription_id, presence: true, numericality: { only_integer: true }
	validates :patient_id, presence: true, numericality: { only_integer: true }
end
