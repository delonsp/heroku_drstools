class Elog < ActiveRecord::Base
	belongs_to :exam
	belongs_to :patient
	validates :exam_id, presence: true, numericality: { only_integer: true }
	validates :patient_id, presence: true, numericality: { only_integer: true }
end
