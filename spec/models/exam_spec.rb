describe Exam do

  before(:each) { @exam = Exam.new(name: 'checkup homem idoso', text: "sodio, potassio, 
  	creatinina, ureia, psa\nurina tipo I, urocultura e antibiograma, TSH, espermograma
  	completo, usg de prostata e de abdome\nglicose, hemograma completo, testosterona total", 
  	user_id: 11) }

  subject { @exam }

  it { should be_valid }

  it { should belong_to(:user) }

  describe "when name is blank" do
    before { @exam.name = " " }
    it { should_not be_valid }
  end

  describe "when text is blank" do
    before { @exam.text = " " }
    it { should_not be_valid }
  end

  describe "when user_id is blank" do
    before { @exam.user_id = " " }
    it { should_not be_valid }
  end

  describe "when user_id is not a number" do
    before { @exam.user_id = "one" }
    it { should_not be_valid }
  end

  describe "when user_id is not an integer" do
    before { @exam.user_id = 2.1 }
    it { should_not be_valid }
  end

end
