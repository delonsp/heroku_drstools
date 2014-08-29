describe User do

  before(:each) { @user = User.new(email: 'user@example.com') }

  subject { @user }



  it { should respond_to(:email) }

  it { should have_many(:patients).with_foreign_key(:patient_id).dependent(:destroy) }
  it { should have_many(:prescriptions).with_foreign_key(:prescription_id).dependent(:destroy) }
  it { should have_many(:exams).with_foreign_key(:exam_id).dependent(:destroy) }

  it "#email returns a string" do
    expect(@user.email).to match 'user@example.com'
  end

end
