class CreatePrescriptions < ActiveRecord::Migration
  def change
    create_table :prescriptions do |t|
      t.string :illness
      t.string :name
      t.text :text
      t.boolean :manipulated
      t.integer :user_id

      t.timestamps
    end
  end
end
