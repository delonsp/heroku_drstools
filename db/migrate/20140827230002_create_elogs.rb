class CreateElogs < ActiveRecord::Migration
  def change
    create_table :elogs do |t|
      t.integer :exam_id
      t.integer :patient_id

      t.timestamps
    end
  end
end
