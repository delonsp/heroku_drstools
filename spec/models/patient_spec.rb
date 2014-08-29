describe Patient do

  before(:each) { @patient = Patient.new(name: 'John Doe', phones: '1111111/2222222', 
  	email: 'user@example.com', user_id: 11, health_plan: 'bradesco', health_plan_code: '12345678', 
  	home_address: 'John Doe Str. 1234, San Diedo, CA, USA') }

  subject { @patient }

  it { should be_valid }

  it { should belong_to(:user) }

  it { should have_many(:plogs).with_foreign_key(:patient_id).dependent(:destroy) }
  it { should have_many(:elogs).with_foreign_key(:exam_id).dependent(:destroy) }
  it { should have_many(:prescriptions).through(:plogs) }
  it { should have_many(:exams).through(:elogs) }
  

  describe "when name is blank" do
    before { @patient.name = " " }
    it { should_not be_valid }
  end

  describe "when user_id is blank" do
    before { @patient.user_id = " " }
    it { should_not be_valid }
  end

  describe "when user_id is not a number" do
    before { @patient.user_id = "one" }
    it { should_not be_valid }
  end

  describe "when user_id is not an integer" do
    before { @patient.user_id = 2.1 }
    it { should_not be_valid }
  end

end
