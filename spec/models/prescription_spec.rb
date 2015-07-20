describe Prescription do
	
	before(:each) { @prescription = Prescription.new(illness: "hpb", name: "finasterida",
		text:"uso interno | uso contínuo\n\nfinasterida 5 mg\n\nmande cápsulas\n\nTomar
		uma capsula ao dia pela manhã", manipulated: true, user_id: 11) }

	subject { @prescription }

	it { should be_valid }

	it { should belong_to(:user) }
	it { should have_many(:plogs).dependent(:destroy) }

	describe "when illness is blank" do
	    before { @prescription.illness = " " }
	    it { should_not be_valid }
  	end

	describe "when name is blank" do
	    before { @prescription.name = " " }
	    it { should_not be_valid }
  	end

  	describe "when text is blank" do
	    before { @prescription.text = " " }
	    it { should_not be_valid }
  	end

  	describe "when user_id is blank" do
	    before { @prescription.user_id = " " }
	    it { should_not be_valid }
	  end

  	describe "when user_id is not a number" do
	    before { @prescription.user_id = "one" }
	    it { should_not be_valid }
	  end

  	describe "when user_id is not an integer" do
	    before { @prescription.user_id = 2.1 }
	    it { should_not be_valid }
	  end


end
