  @if(!empty($projects))
<li class="control-section accordion-section add-project" id="add-project">
	<h3 class="accordion-section-title hndle" tabindex="0"> 
		Project Link <span class="screen-reader-text">Press return or enter to expand</span>
	</h3>
	<div class="accordion-section-content ">
		<div class="inside">
			<div class="customlinkdiv" id="customlinkdiv">
				<label class="howto" for="custom-menu-item-name">
					<select class="custom-select">
						<option value="0">Select Project</option>
						@foreach($projects as $project)
						<option value="{{ $project->slug }}" label="{{ $project->name }}" url="portfolio/{{ $project->slug }}">{{ ucfirst($project->name) }}</option>
						@endforeach
					</select>
					<input name="url" id="custom-menu-item-url-project" type="hidden">
					<input name="label" id="custom-menu-item-name-project" type="hidden">
				</label>
					&nbsp;
					<p class="button-controls">
						<a  href="#" onclick="addcustommenu('project')" class="button-secondary submit-add-to-menu right"  >Add menu item</a>
						<span class="spinner" id="spincustomu"></span>
					</p>
			</div>
		</div>
	</div>
</li>
@endif 