@php
$currentUrl = url()->current();
@endphp

{{-- <meta name="viewport" content="width=device-width,initial-scale=1.0"> --}}
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<link href="{{ asset('vendor/wecodelaravel-menu/style.css')}}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<style>
#hwpwrap .menu-item-bar .menu-item-handle {   width: 80%; }
#hwpwrap .menu-item-settings {  width: 80%; }
.menu-item-depth-0 .menu-item-bar { border-top: black 2px solid!important;}
.form-check-input {float: left!important; margin-left: -3%!important; }
.form-check-input {width: 1em!important; height: 1em!important; margin-top: 0.25em!important; vertical-align: top!important; background-repeat: no-repeat!important; background-position: center!important; background-size: contain!important; border: 1px solid rgba(0,0,0,.25)!important; -webkit-appearance: none!important; -moz-appearance: none!important; appearance: none!important; -webkit-print-color-adjust: exact!important; color-adjust: exact!important; }
.form-check-input {position: absolute!important; margin-top: 0.4rem!important; margin-left: -1.25rem!important; }
input.form-control {/*margin-left: 1.25rem!important;*/ background:var(--bs-gray-300)!important; color: var(--bs-dark)!important; font-weight: 600!important; font-family: var(--bs-font-sans-serif)!important; padding-left: 2%!important; }
p.indented { margin-left: 5px 0 5px 1.25rem!important; }
#env-options {margin-left: 1.25rem!important;}
#hwpwrap input.form-control, #hwpwrap input.widefat, #hwpwrap input.code {padding-left: 1%!important;}
.float-left{float: left;}
.align-right {text-align: right;}
/*[class*="col-"]{float: left;}*/
.btn {display: inline-block; font-weight: 400; color: #212529; text-align: center; vertical-align: middle; cursor: pointer; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; background-color: transparent; border: 1px solid transparent; padding: .375rem .75rem; font-size: 1rem; line-height: 1.5; background-color: #f8f9fa; border-color: #ddd; }
.btn-default {background-color: #f8f9fa; border-color: #ddd; color: #444; }
.customlinkdiv label{width: 100% !important;}
</style>

<div id="hwpwrap">
<div class="custom-wp-admin wp-admin wp-core-ui js menu-max-depth-0 nav-menus-php auto-fold admin-bar">
<div id="wpwrap">
<div id="wpcontent">
<div id="wpbody">
<div id="wpbody-content">

<div class="wrap">

<div class="manage-menus">
	<form method="get" action="{{ $currentUrl }}">
		<label for="menu" class="selected-menu">Select the menu you want to edit:</label>

		{!! Menu::select('menu', $menulist) !!}

		<span class="submit-btn">
			<input type="submit" class="button-secondary" value="Choose">
		</span>
		<span class="add-new-menu-action"> or <a href="{{ $currentUrl }}?action=edit&menu=0">Create new menu</a>. </span>
	</form>
</div>
<div id="nav-menus-frame">

	@if(request()->has('menu')  && !empty(request()->input("menu")))
	<div id="menu-settings-column" class="metabox-holder">

		<div class="clear"></div>

		<form id="nav-menu-meta" action="" class="nav-menu-meta" method="post" enctype="multipart/form-data">
			<div id="side-sortables" class="accordion-container">
				<ul class="outer-border">
					
@includeIf('admin.menu._menu_builder_partials.projects', ['projects' => $projects])
@includeIf('admin.menu._menu_builder_partials.posts', ['posts' => $posts])
@includeIf('admin.menu._menu_builder_partials.landing_pages', ['landingPages' => $landingPages])
@include('admin.menu._menu_builder_partials.custom_links') 


				</ul>
			</div>
		</form>

	</div>
	@endif
	<div id="menu-management-liquid">
		<div id="menu-management">
			<form id="update-nav-menu" action="" method="post" enctype="multipart/form-data">
				<div class="menu-edit ">
					<div id="nav-menu-header">
						<div class="major-publishing-actions">
							<label class="menu-name-label howto open-label" for="menu-name"> <span>Name</span>
								<input name="menu-name" id="menu-name" type="text" class="menu-name regular-text menu-item-textbox" title="Enter menu name" value="@if(isset($indmenu)){{$indmenu->name}}@endif">
								<input type="hidden" id="idmenu" value="@if(isset($indmenu)){{$indmenu->id}}@endif" />
							</label>

							@if(request()->has('action'))
							<div class="publishing-action">
								<a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Create menu</a>
							</div>
							@elseif(request()->has("menu"))
							<div class="publishing-action">
								<a onclick="getmenus()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Save menu</a>
								<span class="spinner spincustomu2" id="spincustomu2"></span>
							</div>

							@else
							<div class="publishing-action">
								<a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Create menu</a>
							</div>
							@endif
						</div>
					</div>
					<div id="post-body">
						<div id="post-body-content">

							@if(request()->has("menu"))
							<h3 class="col-md-12 float-left">Menu Structure</h3>


 
							<div class="col-12 drag-instructions post-body-plain" style="">
								<p>
									Place each item in the order you prefer. Click on the arrow to the right of the item to display more configuration options.
								</p>
							</div>
{{-- <br style="clear:right" /> --}}
						<div class="row">
							{{-- <div class="col-md-6 align-right">
								<span style="line-height: 2rem;">Click Corresponding Button To Check All</span>
							</div> --}}
							<div class="col-md-6 check-all-buttons btn-group align-right" role="group" aria-label="check all buttons">

 
								<button type="button" class="btn check-all localbtn" checkType="local"><i class="fas fa-check-square"></i> &nbsp; All LOCAL</button>
								<button type="button" class="btn check-all devbtn" checkType="development"><i class="fas fa-check-square"></i> &nbsp; All DEV</button>
								<button type="button" class="btn check-all stagebtn" checkType="stage"><i class="fas fa-check-square"></i> &nbsp; All STAGE</button>
								<button type="button" class="btn check-all prodbtn" checkType="production"><i class="fas fa-check-square"></i> &nbsp; All PROD</button>
 
							</div>
						</div>

							@else
							<h3>Menu Creation</h3>
							<div class="drag-instructions post-body-plain" style="">
								<p>
									Please enter the name and select "Create menu" button
								</p>
							</div>
							@endif

							<ul class="menu ui-sortable" id="menu-to-edit">
								@if(isset($menus))
								@foreach($menus as $m)
								<li id="menu-item-{{$m->id}}" class="menu-item menu-item-depth-{{$m->depth}} menu-item-page menu-item-edit-inactive pending" style="display: list-item;">
									<dl class="menu-item-bar">
										<dt class="menu-item-handle">
											<span class="item-title"> <span class="menu-item-title"> <span id="menutitletemp_{{$m->id}}">{{$m->label}}</span> <span style="color: transparent;">|{{$m->id}}|</span> </span> <span class="is-submenu" style="@if($m->depth==0)display: none;@endif">Subelement</span> </span>
											<span class="item-controls"> <span class="item-type">Link</span> <span class="item-order hide-if-js"> <a href="{{ $currentUrl }}?action=move-up-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44" class="item-move-up"><abbr title="Move Up">↑</abbr></a> | <a href="{{ $currentUrl }}?action=move-down-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44" class="item-move-down"><abbr title="Move Down">↓</abbr></a> </span> <a class="item-edit" id="edit-{{$m->id}}" title=" " href="{{ $currentUrl }}?edit-menu-item={{$m->id}}#menu-item-settings-{{$m->id}}"> </a> </span>
										</dt>
									</dl>

									<div class="menu-item-settings" id="menu-item-settings-{{$m->id}}">
										<input type="hidden" class="edit-menu-item-id" name="menuid_{{$m->id}}" value="{{$m->id}}" />
										<p class="indented description description-wide">
											<label for="edit-menu-item-title-{{$m->id}}">Label *</label>
													
												<input type="text" id="idlabelmenu_{{$m->id}}" class="widefat form-control col-12 edit-menu-item-title" name="idlabelmenu_{{$m->id}}" value="{{$m->label}}" placeholder="Label" aria-label="Enter Label">
											
										</p>

										<p class="indented field-css-url description description-wide">
											<label for="edit-menu-item-url-{{$m->id}}"> URL</label>																			 
											<input type="text" id="url_menu_{{$m->id}}" class="widefat form-control col-12 code edit-menu-item-url" id="url_menu_{{$m->id}}" value="{{$m->link}}" placeholder="URL" aria-label="URL">																
										</p>

										<p class="indented field-css-classes description description-wide">
											<label for="edit-menu-item-classes-{{$m->id}}"> Class CSS (optional)</label>																	 
											<input type="text" id="clases_menu_{{$m->id}}" class="widefat form-control col-12 code edit-menu-item-classes" name="clases_menu_{{$m->id}}" value="{{$m->class}}" placeholder="CSS Class" aria-label="CSS Class">
											
										</p>


 
										<p>
 
											<div id="env-options" class="description-wide border p-2 mb-4">
													<strong>Environment Accessible</strong>
													<div class="form-check">
															{!! Form::checkbox('conditionals[]','local', $m->local ==1 ?'checked' : null, ['id' => 'local_'.$m->id.'', 'class' => 'form-check-input local-input conditionals', 'menuId'=>$m->id]) !!} 
														<label class="form-check-label local-label" for="local_{{$m->id}}">
																Local 
														</label>
														</div>
													<div class="form-check">
														{!! Form::checkbox('conditionals[]','development', $m->development ==1 ?'checked' : null, ['id' => 'development_'.$m->id.'', 'class' => 'form-check-input development-input conditionals', 'menuId'=>$m->id]) !!} 
														<label class="form-check-label development-label" for="development_{{$m->id}}">
															Development
														</label>
													</div>
													<div class="form-check">
														{!! Form::checkbox('conditionals[]','stage', $m->stage ==1 ?'checked' : null, ['id' => 'stage_'.$m->id.'', 'class' => 'form-check-input stage-input conditionals', 'menuId'=>$m->id]) !!} 
														<label class="form-check-label stage-label" for="stage_{{$m->id}}">
															Staging
														</label>
													</div>
													<div class="form-check">
														{!! Form::checkbox('conditionals[]','production', $m->production ==1 ?'checked' : null, ['id' => 'production_'.$m->id.'', 'class' => 'form-check-input production-input conditionals', 'menuId'=>$m->id]) !!} 
														<label class="form-check-label production-label" for="production_{{$m->id}}">
															Production
														</label>
													</div>
													<div id="envHelpBlock" class="form-text">
														<i class="text-info">Select the places you want this menu link to be visible.</i>
													</div>
											</div>
 
										</p>
 



										@if(!empty($roles))
										<p class="field-css-role description description-wide">
											<label for="edit-menu-item-role-{{$m->id}}"> Role
												<br>
												<select id="role_menu_{{$m->id}}" class="widefat code edit-menu-item-role" name="role_menu_[{{$m->id}}]" >
													<option value="0">Select Role</option>
													@foreach($roles as $role)
														<option @if($role->id == $m->role_id) selected @endif value="{{ $role->$role_pk }}">{{ ucwords($role->$role_title_field) }}</option>
													@endforeach
												</select>
											</label>
										</p>
										@endif

										<p class="field-move hide-if-no-js description description-wide">
											<label> <span>Move</span> <a href="{{ $currentUrl }}" class="menus-move-up" style="display: none;">Move up</a> <a href="{{ $currentUrl }}" class="menus-move-down" title="Mover uno abajo" style="display: inline;">Move Down</a> <a href="{{ $currentUrl }}" class="menus-move-left" style="display: none;"></a> <a href="{{ $currentUrl }}" class="menus-move-right" style="display: none;"></a> <a href="{{ $currentUrl }}" class="menus-move-top" style="display: none;">Top</a> </label>
										</p>

										<div class="menu-item-actions description-wide submitbox">

											<a class="item-delete submitdelete deletion" id="delete-{{$m->id}}" href="{{ $currentUrl }}?action=delete-menu-item&menu-item={{$m->id}}&_wpnonce=2844002501">Delete</a>
											<span class="meta-sep hide-if-no-js"> | </span>
											<a class="item-cancel submitcancel hide-if-no-js button-secondary" id="cancel-{{$m->id}}" href="{{ $currentUrl }}?edit-menu-item={{$m->id}}&cancel=1424297719#menu-item-settings-{{$m->id}}">Cancel</a>
											<span class="meta-sep hide-if-no-js"> | </span>
											<a onclick="getmenus()" class="button button-primary updatemenu" id="update-{{$m->id}}" href="javascript:void(0)">Update item</a>
											<span class="spinner spincustomu2" id="spincustomu2"></span>
										</div>

									</div>
									<ul class="menu-item-transport"></ul>
								</li>
								@endforeach
								@endif
							</ul>
							<div class="menu-settings">
							</div>
						</div>
					</div>
					<div id="nav-menu-footer">
						<div class="major-publishing-actions">

							@if(request()->has('action'))
							<div class="publishing-action">
								<a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Create menu</a>
							</div>
							@elseif(request()->has("menu"))
							<span class="delete-action"> <a class="submitdelete deletion menu-delete" onclick="deletemenu()" href="javascript:void(9)">Delete menu</a> </span>
							<div class="publishing-action">

								<a onclick="getmenus()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Save menu</a>
								<span class="spinner spincustomu2" id="spincustomu2"></span>
							</div>

							@else
							<div class="publishing-action">
								<a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Create menu</a>
							</div>
							@endif
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

<div class="clear"></div>
</div>

<div class="clear"></div>
</div>
<div class="clear"></div>
</div>

<div class="clear"></div>
</div>
</div>
</div>