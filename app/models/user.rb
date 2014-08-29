class User < ActiveRecord::Base
  # Include default devise modules. Others available are:
  # :confirmable, :lockable, :timeoutable and :omniauthable
  devise :database_authenticatable, :registerable,
         :recoverable, :rememberable, :trackable, :validatable
  enum role: [:user, :vip, :admin]
  after_initialize :set_default_role, :if => :new_record?
  has_many :patients, foreign_key: :patient_id, dependent: :destroy
  has_many :prescriptions, foreign_key: :prescription_id, dependent: :destroy
  has_many :exams, foreign_key: :exam_id, dependent: :destroy

  def set_default_role
    self.role ||= :user
  end

  def name
    [first_name, last_name].compact.join(' ')
  end

end
