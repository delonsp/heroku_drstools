class CreatePlogs < ActiveRecord::Migration
  def change
    create_table :plogs do |t|
      t.integer :prescription_id
      t.integer :patient_id

      t.timestamps
    end
  end
end
