class PrescriptionsController < ApplicationController

	before_filter :authenticate_user!
	after_action :verify_authorized

	def index
		@user = User.find(params[:user_id])
  		authorize @user
    	@prescriptions = @user.prescriptions
	end

	def show
	end
	
end
