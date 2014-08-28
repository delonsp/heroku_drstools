class CreateIndexes < ActiveRecord::Migration
  def self.up
    add_index :patients, :user_id
    add_index :elogs, [:patient_id, :exam_id]
    add_index :plogs, [:patient_id, :prescription_id]
    add_index :prescriptions, :user_id
    add_index :exams, :user_id
    
  end

  def self.down
  	remove_index :patients, :user_id
    remove_index :elogs, [:patient_id, :exam_id]
    remove_index :plogs, [:patient_id, :prescription_id]
    remove_index :prescriptions, :user_id
    remove_index :exams, :user_id
  end
end
