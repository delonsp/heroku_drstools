class CreatePatients < ActiveRecord::Migration
  def change
    create_table :patients do |t|
      t.string :name
      t.string :phones
      t.string :email
      t.integer :user_id
      t.string :health_plan
      t.string :health_plan_code
      t.string :home_address

      t.timestamps
    end
  end
end
