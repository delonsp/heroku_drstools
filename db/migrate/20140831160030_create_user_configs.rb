class CreateUserConfigs < ActiveRecord::Migration
  def change
    create_table :user_configs do |t|
      t.integer :user_id
      t.string :name
      t.string :email
      t.string :crm
      t.boolean :send_email
      t.text :emails_to_send
      t.text :user_data
      t.text :places

      t.timestamps
    end
  end
end
