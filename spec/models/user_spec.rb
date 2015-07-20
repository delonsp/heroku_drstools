describe User do

  before(:each) { @user = User.new(email: 'user@example.com') }

  subject { @user }



  it { should respond_to(:email) }

  it { should have_many(:patients).dependent(:destroy) }
  it { should have_many(:prescriptions).dependent(:destroy) }
  it { should have_many(:exams).dependent(:destroy) }

  it "#email returns a string" do
    expect(@user.email).to match 'user@example.com'
  end

end
