describe Elog do

  before(:each) { @elog = Elog.new(patient_id: 11, exam_id: 11) }

  subject { @elog }

  it { should be_valid }

  describe "when patient_id is blank" do
    before { @elog.patient_id = " " }
    it { should_not be_valid }
  end

  describe "when patient_id is not a number" do
    before { @elog.patient_id = "one" }
    it { should_not be_valid }
  end

  describe "when patient_id is not an integer" do
    before { @elog.patient_id = 2.1 }
    it { should_not be_valid }
  end

  describe "when exam_id is blank" do
    before { @elog.exam_id = " " }
    it { should_not be_valid }
  end

  describe "when exam_id is not a number" do
    before { @elog.exam_id = "one" }
    it { should_not be_valid }
  end

  describe "when exam_id is not an integer" do
    before { @elog.exam_id = 2.1 }
    it { should_not be_valid }
  end

end
