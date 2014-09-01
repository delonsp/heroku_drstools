describe UserConfig do

  before(:each) { @user_config = UserConfig.new(user_id: 11, name: "Joao Pereira", crm: "11111-SP",
  	send_email: true, emails_to_send: "alain@gmail.com; julien@gmail.com", user_data: "titular da sociedade
  	goiana de cardiologia. Formado em 1993", places:"Consultorio 1, Consultorio 2") }

  subject { @user_config }

  it { should be_valid }

  it { should belong_to(:user) }

  describe "when user_data is blank" do
    before { @user_config.user_data = " " }
    it { should_not be_valid }
  end

  
  describe "when places is blank" do
    before { @user_config.places = " " }
    it { should_not be_valid }
  end

  describe "when crm is blank" do
    before { @user_config.crm= " " }
    it { should_not be_valid }
  end

    
  describe "when user_id is blank" do
    before { @user_config.user_id = " " }
    it { should_not be_valid }
  end

  describe "when user_id is not a number" do
    before { @user_config.user_id = "one" }
    it { should_not be_valid }
  end

  describe "when user_id is not an integer" do
    before { @user_config.user_id = 2.1 }
    it { should_not be_valid }
  end
  

end

