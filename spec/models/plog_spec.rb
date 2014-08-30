describe Plog do

  before(:each) { @plog = Plog.new(prescription_id: 11, patient_id: 11) }

  subject { @plog }

  it { should be_valid }

  it { should belong_to(:prescription) }

  it { should belong_to(:patient) }

  describe "when prescription_id is blank" do
    before { @plog.prescription_id = " " }
    it { should_not be_valid }
  end

   describe "when prescription_id is not a number" do
    before { @plog.prescription_id = "one" }
    it { should_not be_valid }
  end

   describe "when prescription_id is not an integer" do
    before { @plog.prescription_id = 2.1 }
    it { should_not be_valid }
  end

  describe "when patient_id is blank" do
    before { @plog.patient_id = " " }
    it { should_not be_valid }
  end


  describe "when patient_id is not a number" do
    before { @plog.prescription_id = "one" }
    it { should_not be_valid }
  end

   describe "when patient_id is not an integer" do
    before { @plog.prescription_id = 2.1 }
    it { should_not be_valid }
  end


end
