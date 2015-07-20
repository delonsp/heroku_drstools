class UserConfigAddIndexes < ActiveRecord::Migration
  def self.up
    add_index :user_configs, :user_id
  end

  def self.down
  	remove_index :user_configs, :user_id
  end

end