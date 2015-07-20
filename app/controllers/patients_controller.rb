class PatientsController < ApplicationController
	before_filter :authenticate_user!
	after_action :verify_authorized

	def index
	end

end
