class User < ActiveRecord::Base
  # Include default devise modules. Others available are:
  # :confirmable, :lockable, :timeoutable and :omniauthable
  devise :database_authenticatable, :registerable,
         :recoverable, :rememberable, :trackable, :validatable
  enum role: [:user, :vip, :admin]
  after_initialize :set_default_role, :if => :new_record?
  has_many :patients, dependent: :destroy
  has_many :prescriptions, dependent: :destroy
  has_many :exams, dependent: :destroy

  def set_default_role
    self.role ||= :user
  end

  def name
    [first_name, last_name].compact.join(' ')
  end

end
