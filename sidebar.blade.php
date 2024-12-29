<aside class="main-sidebar sidebar-light-red bg-darkred elevation-4">
	<!-- Brand Logo -->
	<a href="/" class="brand-link">
		<img src="/images/logo_youduct.png" alt="Tracker" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">{{ __('PLATFORM-TITLE') }}</span>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">
		@php
			if( in_array(session('uLvl'), ['AGENCY', 'SUPPLIER', 'DRIVER', 'CUSTOMER']) )
			{
				$myPageUrl = Auth::user()->username!=null ? Auth::user()->username : strtolower(Auth::user()->usertype) .'/'. Auth::user()->id;
				$myAvatarUrl = 'storage/avatars/'. session('uId');
				$myName = session('uLvl')=='CUSTOMER' ? request()->user()->lastname : request()->user()->tradename;
			}
			else
			{
				$myPageUrl = Auth::user()->boss->username!=null ? request()->user()->boss->username : 'agency/'. Auth::user()->boss->id;
				$myAvatarUrl = 'storage/staff/'. request()->user()->id;
				$myName = request()->user()->firstname;
			}
		@endphp
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<a href="/{{ $myPageUrl }}">
					<img src="{!! asset(Helper::getImgUrlWithExtenstion($myAvatarUrl, 'small', true)) !!}" class="img-circle elevation-2">
				</a>
			</div>
			<div class="info">
				<a href="/{{ $myPageUrl }}">
					{{ $myName }}
				</a>
			</div>
		</div>
		
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

				@if( session('uLvl')=='SUPPLIER' )
					<li class="nav-item">
						<a href="{{ route('packages.selectPackageHandler') }}" class="lightBlueB nav-link" role="button">
							
							<i class="nav-icon fa-regular fa-square-plus"></i>
							<p>{{ __('ADD-PACKAGE') }}</p>
							{{-- <span class="btn btn-sm lightBlueB activeB" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('ADD-PACKAGE') }}">
								<i class="fa-solid fa-plus me-2"></i>{{ __('ADD-PACKAGE') }}
							</span> --}}
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('manage.stocks.create') }}" class="lightPurpleB nav-link" role="button">
							
							<i class="nav-icon fa-regular fa-square-plus"></i>
							<p>{{ __('ADD-STOCK') }}</p>
							{{-- <span class="btn btn-sm lightPurpleB activeB" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('ADD-STOCK') }}">
								<i class="fa-solid fa-plus me-2"></i>{{ __('ADD-STOCK') }}
							</span> --}}
						</a>
					</li>
					<div class="listSeparator my-1"></div>
				@endif

				@if( !in_array(session('uLvl'), ['PICKER']) )
					<li class="nav-item">
						<a href="{{ route('packages.index') }}" class="nav-link {{ request()->routeIs('packages.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-cubes"></i>
							<p>{{ __('PACKAGES') }}</p>
						</a>
					</li>

					<div class="listSeparator my-1"></div>
				

					<li class="nav-item">
						<a href="{{ route('manage.index') }}" class="nav-link {{ request()->routeIs('manage.index') ? 'active' : false }}">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>{{ __('STATISTICS') }}</p>
						</a>
					</li>
					
					<div class="listSeparator my-1"></div>
				@endif

				@if( session('uLvl')=='SUPPLIER' )
				
					<li class="nav-item">
						<a href="{{ route('manage.stocks.index') }}" class="nav-link {{ request()->routeIs('manage.stocks.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-cubes"></i>
							<p>{{ __('STOCKS') }}</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="{{ route('manage.providers.index') }}" class="nav-link {{ request()->routeIs('manage.providers.*') ? 'active' : false }}">
							<i class="nav-icon fa-solid fa-people-carry-box"></i>
							<p>{{ __('PROVIDERS') }}</p>
						</a>
					</li>
					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('items.index') }}" class="nav-link {{ request()->routeIs(['items.*', 'item.*']) ? 'active' : false }}">
							<i class="nav-icon fas fa-store"></i>
							<p>{{ __('STORE') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}
					</li>

					<li class="nav-item">
						<a href="{{ route('orders.index') }}" class="nav-link {{ request()->routeIs('orders.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-headset"></i>
							<p>{{ __('ORDERS') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}
					</li>

					<li class="nav-item">
						<a href="{{ route('affiliateRequests.index') }}" class="nav-link {{ request()->routeIs('affiliateRequests.*') ? 'active' : false }}">
							<i class="nav-icon fa-solid fa-bullhorn"></i>
							<p>{{ __('AFFILIATE-REQUESTS') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}	
					</li>
					<li class="nav-item">
						<a href="{{ route('itemReviews.index') }}" class="nav-link {{ request()->routeIs('itemReviews.*') ? 'active' : false }}">
							<i class="nav-icon fa-regular fa-comments"></i>
							<p>{{ __('ITEM-REVIEWS') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}	
					</li>
					<li class="nav-item">
						<a href="{{ route('manage.fbPixels.index') }}" class="nav-link {{ request()->routeIs('manage.fbPixels.*') ? 'active' : false }}">
							<i class="nav-icon fa-solid fa-bullhorn"></i>
							<p>{{ __('FB-PIXELS') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}	
					</li>
					<div class="listSeparator my-1"></div>
					
					<li class="nav-item">
						<a href="{{ route('drivers.index') }}" class="nav-link {{ request()->routeIs('drivers.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-motorcycle"></i>
							<p>{{ __('DRIVERS') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}	
					</li>

					<li class="nav-item">
						<a href="{{ route('agencies.index') }}" class="nav-link {{ request()->routeIs('agencies.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-warehouse"></i>
							<p>{{ __('DELIVERY-COMPANIES') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}
					</li>
		
					<div class="listSeparator my-1"></div>
		
					<li class="nav-item">
						<a href="{{ route('demands.index) }}" class="nav-link {{ request()->routeIs('demands.*') ? 'active' : false }}">
							<i class="nav-icon fa-solid fa-list"></i>
							<p>{{ __('DEMANDS') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}
					</li>
		
					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('packages.supplierInvoices') }}" class="nav-link {{ request()->routeIs(['packages.supplierInvoices', 'packages.supplierInvoice']) ? 'active' : false }}">
							<i class="nav-icon fas fa-file-invoice-dollar"></i>
							<p>{{ __('INVOICES') }}</p>
							@if( request()->user()->supplier_invoice_notif!=0 )
								<span class="badge bg-red float-end">{{ request()->user()->supplier_invoice_notif }}</span>
							@endif
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('AGENCY-INVOICES') }}</span> --}}
					</li>

					<li class="nav-item">
						<a href="{{ route('packages.returnGroups') }}" class="nav-link {{ request()->routeIs(['packages.returnGroups', 'packages.returnGroup']) ? 'active' : false }}">
							<i class="nav-icon fas fa-undo-alt"></i>
							<p>{{ __('RETURNED') }}</p>
							@if( request()->user()->new_rg_notif!=0 )
								<span class="badge bg-red float-end">{{ request()->user()->new_rg_notif }}</span>
							@endif
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('AGENCY-INVOICES') }}</span> --}}
					</li>

					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('deliveryorders.index') }}" class="nav-link {{ request()->routeIs('deliveryorders.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-truck-pickup"></i>
							<p>
								{{ __('DELIVERY-ORDERS') }}
								{{-- <span class="subMainTopListColumn">{{ __('REQUEST-PICKUP') }}</span> --}}
							</p>
						</a>
					</li>
		
					<li class="nav-item">
						<a href="{{ route('dispatchGroups.index') }}" class="nav-link {{ request()->routeIs('dispatchGroups.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-truck-moving"></i>
							<p>
								{{ __('DISPATCH-GROUPS') }}
								{{-- <span class="subMainTopListColumn">{{ __('DISPATCH-TO-AGENCIES') }}</span> --}}
							</p>
						</a>
					</li>
		
					<li class="nav-item">
						<a href="{{ route('transferGroups.index') }}" class="nav-link {{ request()->routeIs('transferGroups.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-people-carry"></i>
							<p>
								{{ __('TRANSFER-GROUPS') }}
								{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}
							</p>
						</a>
					</li>
		
					{{-- <div class="listSeparator my-1"></div> --}}
		
					{{-- <li class="nav-item">
						<a href="{{ route('manage.account.index') }}" class="nav-link {{ request()->routeIs('manage.account.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-user-cog"></i>
							{{ __('CONTROL-PANEL') }}
						</a>
					</li> --}}
		
					{{-- <li class="nav-header">{{ __('MANAGE') }}</li> --}}

					<div class="listSeparator my-1"></div>

					<li class="nav-item has-treeview {{ request()->routeIs(['manage.supplierInvoices.*', 'manage.driverInvoices.*', 'manage.agencyInvoices.*', 'manage.collectInvoices.*', 'manage.serviceInvoices.*', 'manage.affiliateInvoices.*']) ? 'menu-open' : false }}">
						<a href="#" class="nav-link {{ request()->routeIs(['manage.supplierInvoices.*', 'manage.driverInvoices.*', 'manage.agencyInvoices.*', 'manage.collectInvoices.*', 'manage.serviceInvoices.*', 'manage.affiliateInvoices.*']) ? 'active' : false }}">
							<i class="nav-icon fas fa-file-invoice-dollar"></i>
							<p>
								{{ __('INVOICES') }}
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('manage.supplierInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.affiliateInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon greenText"></i>
									<p>{{ __('AFFILIATE-INVOICES') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.driverInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.driverInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon purpleText"></i>
									<p>{{ __('DRIVER-INVOICES') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.agencyInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.serviceInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon orangeText"></i>
									<p>{{ __('SERVICE-INVOICES') }}</p>
								</a>
							</li>
						</ul>
					</li>

					<div class="listSeparator my-1"></div>

					<li class="nav-item has-treeview {{ request()->routeIs('manage.account.*') ? 'menu-open' : false }}">
						<a href="#" class="nav-link {{ request()->routeIs('manage.account.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-user"></i>
							<p>
								{{ __('ACCOUNT') }}
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('manage.account.index') }}" class="nav-link {{ request()->routeIs('manage.account.editAccount') ? 'active' : false }}">
									<i class="nav-icon fas fa-users-cog"></i>
									<p>{{ __('ACCOUNT') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.account.index') }}" class="nav-link {{ request()->routeIs('manage.account.editAbout') ? 'active' : false }}">
									<i class="nav-icon fas fa-users-cog"></i>
									<p>{{ __('ABOUT') }}</p>
								</a>
							</li>
							
							<li class="nav-item">
								<a href="{{ route('manage.account.index') }}" class="nav-link {{ request()->routeIs('manage.account.editDocument') ? 'active' : false }}">
									<i class="nav-icon fa-regular fa-id-card"></i>
									<p>{{ __('DOCUMENTS') }}</p>
								</a>
							</li>

							@if( in_array(session('uLvl'), ['AGENCY','SUPPLIER']) )
								<li class="nav-item">
									<a href="{{ route('manage.account.index') }}" class="nav-link {{ request()->routeIs('manage.account.editUserName') ? 'active' : false }}">
										<i class="nav-icon fas fa-link"></i>
										<p>{{ __('USERNAME') }}</p>
									</a>
								</li>
							@endif

							<li class="nav-item">
								<a href="{{ route('manage.account.index') }}" class="nav-link {{ request()->routeIs('manage.account.editAvatar') ? 'active' : false }}">
									<i class="nav-icon fas fa-portrait"></i>
									<p>{{ __('AVATAR') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.account.index') }}" class="nav-link {{ request()->routeIs('manage.account.editPassword') ? 'active' : false }}">
									<i class="nav-icon fas fa-shield-alt"></i>
									<p>{{ __('SECURITY') }}</p>
								</a>
							</li>
						</ul>
					</li>

					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('manage.staff.index') }}" class="nav-link {{ request()->routeIs('manage.staff.*') ? 'active' : false }}">
							<i class="nav-icon fa-solid fa-user-tie"></i>
							<p>{{ __('STAFF') }}</p>
						</a>
					</li>

					<div class="listSeparator my-1"></div>
					<li class="nav-item">
						<a href="{{ route('manage.driverCommissions.index') }}" class="nav-link {{ request()->routeIs('manage.driverCommissions.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-hand-holding-usd"></i>
							<p>{{ __('DRIVER-COMMISSIONS') }}</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="{{ route('manage.driversCommissionType.index') }}" class="nav-link {{ request()->routeIs('manage.driversCommissionType.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-tags"></i>
							<p>{{ __('DRIVER-COMMISSIONS-TYPE') }}</p>
						</a>
					</li>
				@endif

				@if( session('uLvl')=='DRIVER' )
					
					<li class="nav-item">
						<a href="{{ route('suppliers.index') }}" class="nav-link {{ request()->routeIs('suppliers.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-store"></i>
							<p>{{ __('SUPPLIERS') }}</p>
						</a>
					</li>
					
					<li class="nav-item">
						<a href="{{ route('agencies.index') }}" class="nav-link {{ request()->routeIs('agencies.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-warehouse"></i>
							<p>{{ __('DELIVERY-COMPANIES') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}
					</li>
		
					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('manage.sharedStocks.index') }}" class="nav-link {{ request()->routeIs('manage.sharedStocks.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-boxes-stacked"></i>
							<p>{{ __('SHARED-STOCKS') }}</p>
						</a>
					</li>
					
					<div class="listSeparator my-1"></div>
		
					<li class="nav-item">
						<a href="{{ route('demands.index') }}" class="nav-link {{ request()->routeIs('demands.*') ? 'active' : false }}">
							<i class="nav-icon fa-solid fa-list"></i>
							<p>{{ __('DEMANDS') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}
					</li>
		
					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('packages.returnGroups') }}" class="nav-link {{ request()->routeIs(['packages.returnGroups', 'packages.returnGroup']) ? 'active' : false }}">
							<i class="nav-icon fas fa-undo-alt"></i>
							<p>{{ __('RETURNED') }}</p>
							@if( request()->user()->new_rg_notif!=0 )
								<span class="badge bg-red float-end">{{ request()->user()->new_rg_notif }}</span>
							@endif
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('AGENCY-INVOICES') }}</span> --}}
					</li>

					<div class="listSeparator my-1"></div>

					<li class="nav-item has-treeview {{ request()->routeIs(['manage.supplierInvoices.*', 'manage.driverInvoices.*', 'manage.agencyInvoices.*', 'manage.collectInvoices.*', 'manage.serviceInvoices.*']) ? 'menu-open' : false }}">
						<a href="#" class="nav-link {{ request()->routeIs(['manage.supplierInvoices.*', 'manage.driverInvoices.*', 'manage.agencyInvoices.*', 'manage.collectInvoices.*', 'manage.serviceInvoices.*']) ? 'active' : false }}">
							<i class="nav-icon fas fa-file-invoice-dollar"></i>
							<p>
								{{ __('INVOICES') }}
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('manage.supplierInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.driverInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon purpleText"></i>
									<p>{{ __('DRIVER-INVOICES') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.agencyInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.serviceInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon orangeText"></i>
									<p>{{ __('SERVICE-INVOICES') }}</p>
								</a>
							</li>
						</ul>
					</li>

					<div class="listSeparator my-1"></div>
					
					<li class="nav-item has-treeview {{ request()->routeIs('manage.account.*') ? 'menu-open' : false }}">
						<a href="#" class="nav-link {{ request()->routeIs('manage.account.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-user"></i>
							<p>
								{{ __('ACCOUNT') }}
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('manage.account.editAccount') }}" class="nav-link {{ request()->routeIs('manage.account.editAccount') ? 'active' : false }}">
									<i class="nav-icon fas fa-users-cog"></i>
									<p>{{ __('ACCOUNT') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.account.editAbout') }}" class="nav-link {{ request()->routeIs('manage.account.editAbout') ? 'active' : false }}">
									<i class="nav-icon fas fa-users-cog"></i>
									<p>{{ __('ABOUT') }}</p>
								</a>
							</li>
							
							<li class="nav-item">
								<a href="{{ route('manage.account.editDocument') }}" class="nav-link {{ request()->routeIs('manage.account.editDocument') ? 'active' : false }}">
									<i class="nav-icon fa-regular fa-id-card"></i>
									<p>{{ __('DOCUMENTS') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.account.editUserName') }}" class="nav-link {{ request()->routeIs('manage.account.editUserName') ? 'active' : false }}">
									<i class="nav-icon fas fa-link"></i>
									<p>{{ __('USERNAME') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.account.editAvatar') }}" class="nav-link {{ request()->routeIs('manage.account.editAvatar') ? 'active' : false }}">
									<i class="nav-icon fas fa-portrait"></i>
									<p>{{ __('AVATAR') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.account.editPassword') }}" class="nav-link {{ request()->routeIs('manage.account.editPassword') ? 'active' : false }}">
									<i class="nav-icon fas fa-shield-alt"></i>
									<p>{{ __('SECURITY') }}</p>
								</a>
							</li>
						</ul>
					</li>

					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('manage.driverZones.index') }}" class="nav-link {{ request()->routeIs('manage.driverZones.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-map-marker-alt"></i>
							<p>{{ __('DRIVER-ZONES') }}</p>
						</a>
					</li>

					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('manage.promoters.index') }}" class="nav-link {{ request()->routeIs('manage.promoters.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-exclamation-triangle"></i>
							<p>{{ __('PROMOTERS') }}</p>
						</a>
					</li>
				@endif

				@if( in_array(session('uLvl'), ['AGENCY','AGENCYMODER']) )

					<li class="nav-item">
						<a href="{{ route('suppliers.index') }}" class="nav-link {{ request()->routeIs('suppliers.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-store"></i>
							<p>{{ __('SUPPLIERS') }}</p>
						</a>
					</li>
					
					<li class="nav-item">
						<a href="{{ route('drivers.index') }}" class="nav-link {{ request()->routeIs('drivers.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-motorcycle"></i>
							<p>{{ __('DRIVERS') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}	
					</li>

					<li class="nav-item">
						<a href="{{ route('agencies.index') }}" class="nav-link {{ request()->routeIs('agencies.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-warehouse"></i>
							<p>{{ __('DELIVERY-COMPANIES') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}
					</li>
		
					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('manage.sharedStocks.index') }}" class="nav-link {{ request()->routeIs('manage.sharedStocks.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-boxes-stacked"></i>
							<p>{{ __('SHARED-STOCKS') }}</p>
						</a>
					</li>

					<div class="listSeparator my-1"></div>

					@if( session('comTyp')=='PARTNER' )
						<li class="nav-item">
							<a href="{{ route('collect.index') }}" class="nav-link {{ request()->routeIs('collect.*') ? "active" : false }}" role="button">
								<i class="nav-icon fa-solid fa-truck-ramp-box"></i>
								<p>{{ __('COLLECT') }}</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{ route('collectGroups.index') }}" class="nav-link {{ request()->routeIs('collectGroups.*') ? 'active' : false }}">
								<i class="nav-icon fas fa-box"></i>
								<p>{{ __('COLLECT-GROUPS') }}</p>
							</a>
						</li>

						<div class="listSeparator my-1"></div>
					@endif

					<li class="nav-item">
						<a href="{{ route('deliveryorders.index') }}" class="nav-link {{ request()->routeIs('deliveryorders.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-truck-pickup"></i>
							<p>{{ __('PICKUP') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('PICKUP') }}</span> --}}
					</li>
					<li class="nav-item">
						<a href="{{ route('transferGroups.index') }}" class="nav-link {{ request()->routeIs('transferGroups.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-people-carry"></i>
							<p>{{ __('TRANSFER-GROUPS') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}
					</li>

					<li class="nav-item">
						<a href="{{ route('dispatchGroups.index') }}" class="nav-link {{ request()->routeIs('dispatchGroups.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-truck-moving"></i>
							<p>{{ __('DISPATCH-GROUPS') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('DISPATCH-TO-AGENCIES') }}</span> --}}
					</li>

					<li class="nav-item">
						<a href="{{ route('returnGroups.index') }}" class="nav-link {{ request()->routeIs('returnGroups.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-angle-double-left"></i>
							<p>{{ __('RETURN-GROUPS') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('RETURN-PACKAGES') }}</span> --}}
					</li>

					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('packages.dispatchGroups') }}" class="nav-link {{ request()->routeIs('packages.dispatchGroups') ? 'active' : false }}">
							<i class="nav-icon fas fa-truck-loading"></i>
							<p>{{ __('DISPATCHED') }}</p>
							@if( request()->user()->new_dg_notif!=0 )
								<span class="badge bg-red float-end">{{ request()->user()->new_dg_notif }}</span>
							@endif
						</a>
					</li>
					
					<li class="nav-item">
						<a href="{{ route('packages.returnGroups') }}" class="nav-link {{ request()->routeIs(['packages.returnGroups', 'packages.returnGroup']) ? 'active' : false }}">
							<i class="nav-icon fas fa-undo-alt"></i>
							<p>{{ __('RETURNED') }}</p>
							@if( request()->user()->new_rg_notif!=0 )
								<span class="badge bg-red float-end">{{ request()->user()->new_rg_notif }}</span>
							@endif
						</a>
					</li>

					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('packages.agencyInvoices') }}" class="nav-link {{ request()->routeIs('packages.agencyInvoices') ? 'active' : false }}">
							<i class="nav-icon fas fa-file-invoice-dollar"></i>
							<p>{{ __('AGENCY-INVOICES') }}</p>
							@if( request()->user()->agency_invoice_notif!=0 )
								<span class="badge bg-red float-end">{{ request()->user()->agency_invoice_notif }}</span>
							@endif
						</a>
					</li>

					<li class="nav-item">
						<a href="{{ route('packages.collectInvoices') }}" class="nav-link {{ request()->routeIs('packages.collectInvoices') ? 'active' : false }}">
							<i class="nav-icon fas fa-file-invoice-dollar"></i>
							<p>{{ __('COLLECT-INVOICES') }}</p>
							@if( request()->user()->agency_invoice_notif!=0 )
								<span class="badge bg-red float-end">{{ request()->user()->agency_invoice_notif }}</span>
							@endif
						</a>
					</li>

					<div class="listSeparator"></div>

					<li class="nav-item has-treeview {{ request()->routeIs(['manage.supplierInvoices.*', 'manage.driverInvoices.*', 'manage.agencyInvoices.*', 'manage.collectInvoices.*', 'manage.serviceInvoices.*']) ? 'menu-open' : false }}">
						<a href="#" class="nav-link {{ request()->routeIs(['manage.supplierInvoices.*', 'manage.driverInvoices.*', 'manage.agencyInvoices.*', 'manage.collectInvoices.*', 'manage.serviceInvoices.*']) ? 'active' : false }}">
							<i class="nav-icon fas fa-file-invoice-dollar"></i>
							<p>
								{{ __('INVOICES') }}
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('manage.supplierInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.supplierInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon greenText"></i>
									<p>{{ __('SUPPLIER-INVOICES') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.driverInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.driverInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon purpleText"></i>
									<p>{{ __('DRIVER-INVOICES') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.agencyInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.agencyInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon basicBlueText"></i>
									<p>{{ __('AGENCY-INVOICES') }}</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('manage.collectInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.collectInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon blueText"></i>
									<p>{{ __('COLLECT-INVOICES') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.serviceInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.serviceInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon orangeText"></i>
									<p>{{ __('SERVICE-INVOICES') }}</p>
								</a>
							</li>
						</ul>
					</li>

					<div class="listSeparator my-1"></div>

					<li class="nav-item has-treeview {{ request()->routeIs('manage.account.*') ? 'menu-open' : false }}">
						<a href="#" class="nav-link {{ request()->routeIs('manage.account.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-user"></i>
							<p>
								{{ __('ACCOUNT') }}
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('manage.account.editAccount') }}" class="nav-link {{ request()->routeIs('manage.account.editAccount') ? 'active' : false }}">
									<i class="nav-icon fas fa-users-cog"></i>
									<p>{{ __('ACCOUNT') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.account.editAbout') }}" class="nav-link {{ request()->routeIs('manage.account.editAbout') ? 'active' : false }}">
									<i class="nav-icon fas fa-users-cog"></i>
									<p>{{ __('ABOUT') }}</p>
								</a>
							</li>
							
							<li class="nav-item">
								<a href="{{ route('manage.account.editDocument') }}" class="nav-link {{ request()->routeIs('manage.account.editDocument') ? 'active' : false }}">
									<i class="nav-icon fa-regular fa-id-card"></i>
									<p>{{ __('DOCUMENTS') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.account.editUserName') }}" class="nav-link {{ request()->routeIs('manage.account.editUserName') ? 'active' : false }}">
									<i class="nav-icon fas fa-link"></i>
									<p>{{ __('USERNAME') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.account.editAvatar') }}" class="nav-link {{ request()->routeIs('manage.account.editAvatar') ? 'active' : false }}">
									<i class="nav-icon fas fa-portrait"></i>
									<p>{{ __('AVATAR') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.account.editPassword') }}" class="nav-link {{ request()->routeIs('manage.account.editPassword') ? 'active' : false }}">
									<i class="nav-icon fas fa-shield-alt"></i>
									<p>{{ __('SECURITY') }}</p>
								</a>
							</li>
						</ul>
					</li>

					@if( session('uLvl')=='AGENCY' )
						<div class="listSeparator my-1"></div>

						<li class="nav-item">
							<a href="{{ route('manage.agencySettings.edit') }}" class="nav-link {{ request()->routeIs('manage.agencySettings.edit') ? 'active' : false }}">
								<i class="nav-icon fas fa-cogs"></i>
								<p>{{ __('SETTINGS') }}</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{ route('manage.commission.index') }}" class="nav-link {{ request()->routeIs('manage.commission.*') ? 'active' : false }}">
								<i class="nav-icon fas fa-exclamation-triangle"></i>
								<p>{{ __('COMMISSION') }}</p>
							</a>
						</li>
					@endif
					
					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('manage.tariffs.index') }}" class="nav-link {{ request()->routeIs('manage.tariffs.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-tags"></i>
							<p>{{ __('TARIFFS') }}</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="{{ route('manage.tariffCustoms.index') }}" class="nav-link {{ request()->routeIs('manage.tariffCustoms.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-tags"></i>
							<p>{{ __('CUSTOM-TARIFFS') }}</p>
						</a>
					</li>

					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('manage.staff.index') }}" class="nav-link {{ request()->routeIs('manage.staff.*') ? 'active' : false }}">
							<i class="nav-icon fa-solid fa-user-tie"></i>
							<p>{{ __('STAFF') }}</p>
						</a>
					</li>
					
					@if( session('uLvl')=='AGENCY' )
						<div class="listSeparator my-1"></div>
					
						<li class="nav-item">
							<a href="{{ route('manage.driverCommissions.index') }}" class="nav-link {{ request()->routeIs('manage.driverCommissions.*') ? 'active' : false }}">
								<i class="nav-icon fas fa-hand-holding-usd"></i>
								<p>{{ __('DRIVER-COMMISSIONS') }}</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{ route('manage.driversCommissionType.index') }}" class="nav-link {{ request()->routeIs('manage.driversCommissionType.*') ? 'active' : false }}">
								<i class="nav-icon fas fa-tags"></i>
								<p>{{ __('DRIVER-COMMISSIONS-TYPE') }}</p>
							</a>
						</li>
					@endif


					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('manage.packagings.index') }}" class="nav-link {{ request()->routeIs('manage.packagings.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-box-open"></i>
							<p>{{ __('PACKAGINGS') }}</p>
						</a>
					</li>
				@endif

				@if( session('uLvl')=='CUSTOMER' )

					
					<li class="nav-item">
						<a href="{{ route('demands.index') }}" class="nav-link {{ request()->routeIs('demands.*') ? 'active' : false }}">
							<i class="nav-icon fa-solid fa-list"></i>
							<p>{{ __('DEMANDS') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}
					</li>
		
					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('drivers.index') }}" class="nav-link {{ request()->routeIs('drivers.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-motorcycle"></i>
							<p>{{ __('DRIVERS') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}	
					</li>
					
					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('affiliate.index') }}" class="nav-link {{ request()->routeIs('affiliate.*') ? 'active' : false }}">
							<i class="nav-icon fa-solid fa-bullhorn"></i>
							<p>{{ __('AFFILIATE') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}	
					</li>
					
					<div class="listSeparator my-1"></div>
					
					<li class="nav-item">
						<a href="{{ route('packages.affiliateInvoices') }}" class="nav-link {{ request()->routeIs(['packages.affiliateInvoices', 'packages.affiliateInvoice']) ? 'active' : false }}">
							<i class="nav-icon fas fa-file-invoice-dollar"></i>
							<p>{{ __('AFFILIATE-INVOICES') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}	
					</li>
					
					<div class="listSeparator my-1"></div>

					<li class="nav-item has-treeview {{ request()->routeIs('manage.account.*') ? 'menu-open' : false }}">
						<a href="#" class="nav-link {{ request()->routeIs('manage.account.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-user"></i>
							<p>
								{{ __('ACCOUNT') }}
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('manage.account.index') }}" class="nav-link {{ request()->routeIs('manage.account.editAccount') ? 'active' : false }}">
									<i class="nav-icon fas fa-users-cog"></i>
									<p>{{ __('ACCOUNT') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.account.about') }}" class="nav-link {{ request()->routeIs('manage.account.editAbout') ? 'active' : false }}">
									<i class="nav-icon fas fa-users-cog"></i>
									<p>{{ __('ABOUT') }}</p>
								</a>
							</li>
							
							<li class="nav-item">
								<a href="{{ route('manage.account.documents') }}" class="nav-link {{ request()->routeIs('manage.account.editDocument') ? 'active' : false }}">
									<i class="nav-icon fa-regular fa-id-card"></i>
									<p>{{ __('DOCUMENTS') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.account.avatar') }}" class="nav-link {{ request()->routeIs('manage.account.editAvatar') ? 'active' : false }}">
									<i class="nav-icon fas fa-portrait"></i>
									<p>{{ __('AVATAR') }}</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('manage.account.password') }}" class="nav-link {{ request()->routeIs('manage.account.editPassword') ? 'active' : false }}">
									<i class="nav-icon fas fa-shield-alt"></i>
									<p>{{ __('SECURITY') }}</p>
								</a>
							</li>
						</ul>
					</li>
				@endif

				@if( session('uLvl')=='PICKER' )
					<li class="nav-item">
						<a href="{{ route('deliveryorders.index') }}" class="nav-link {{ request()->routeIs('deliveryorders.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-truck-pickup"></i>
							<p>
								{{ __('PICKUP') }}
								{{-- <span class="subMainTopListColumn">{{ __('REQUEST-PICKUP') }}</span> --}}
							</p>
						</a>
					</li>
					
					<div class="listSeparator my-1"></div>
					
					<li class="nav-item">
						<a href="{{ route('manage.sharedStocks.index') }}" class="nav-link {{ request()->routeIs('manage.sharedStocks.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-boxes-stacked"></i>
							<p>{{ __('SHARED-STOCKS') }}</p>
						</a>
					</li>

					<div class="listSeparator my-1"></div>

					<li class="nav-item">
						<a href="{{ route('collect.index') }}" class="nav-link {{ request()->routeIs('collect.*') ? "active" : false }}" role="button">
							<i class="nav-icon fa-solid fa-truck-ramp-box"></i>
							<p>{{ __('COLLECT') }}</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('collectGroups.index') }}" class="nav-link {{ request()->routeIs('collectGroups.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-box"></i>
							<p>{{ __('COLLECT-GROUPS') }}</p>
						</a>
						{{-- <span class="subMainTopListColumn">{{ __('TRANSFER-TO-DRIVERS') }}</span> --}}	
					</li>
				@endif

				@if( session('uLvl')=='CONFIRMER' )
					<li class="nav-item">
						<a href="{{ route('orders.index') }}" class="nav-link {{ request()->routeIs('orders.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-headset"></i>
							<p>{{ __('ORDERS') }}</p>
						</a>
					</li>
				@endif

				@if( session('uLvl')=='STOREKEEPER' )
					<li class="nav-item">
						<a href="{{ route('manage.sharedStocks.index') }}" class="nav-link {{ request()->routeIs('manage.sharedStocks.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-boxes-stacked"></i>
							<p>{{ __('SHARED-STOCKS') }}</p>
						</a>
					</li>
				@endif

				{{-- XXXXXXXXXXXXXXXXXXXXXXXXXXX --}}

				@if( in_array(session('uLvl'), ['AGENCY','AGENCYMODER', 'DRIVER']) && false )
					<li class="nav-item">
						<a href="{{ route('manage.sharedStocks.index') }}" class="nav-link {{ request()->routeIs('manage.sharedStocks.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-cubes"></i>
							<p>{{ __('SHARED-STOCKS') }}</p>
						</a>
					</li>
				@endif

				<div class="listSeparator my-1"></div>

				<!-- TREEVIEW -->
				@if( in_array(session('uLvl'), ['AGENCY','AGENCYMODER', 'SUPPLIER', 'DRIVER']) && false )
				{{-- <li class="nav-item has-treeview {{ request()->routeIs(['manage.supplierInvoices.*', 'manage.driverInvoices.*', 'manage.agencyInvoices.*', 'manage.collectInvoices.*', 'manage.serviceInvoices.*']) ? 'menu-open' : false }}">
					<a href="#" class="nav-link {{ request()->routeIs(['manage.supplierInvoices.*', 'manage.driverInvoices.*', 'manage.agencyInvoices.*', 'manage.collectInvoices.*', 'manage.serviceInvoices.*']) ? 'active' : false }}">
						<i class="nav-icon fas fa-file-invoice-dollar"></i>
						<p>
							{{ __('INVOICES') }}
							<i class="right fas fa-angle-left"></i>
						</p>
					</a> --}}
					{{-- <ul class="nav nav-treeview"> --}}
						@if( in_array(session('uLvl'), ['AGENCY','AGENCYMODER']) )
							<li class="nav-item">
								<a href="{{ route('manage.supplierInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.supplierInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon greenText"></i>
									<p>{{ __('SUPPLIER-INVOICES') }}</p>
								</a>
							</li>
						@endif

						@if( in_array(session('uLvl'), ['AGENCY','AGENCYMODER', 'SUPPLIER', 'DRIVER']) )
							<li class="nav-item">
								<a href="{{ route('manage.driverInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.driverInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon purpleText"></i>
									<p>{{ __('DRIVER-INVOICES') }}</p>
								</a>
							</li>
						@endif

						@if( in_array(session('uLvl'), ['AGENCY','AGENCYMODER']) )
							<li class="nav-item">
								<a href="{{ route('manage.agencyInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.agencyInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon basicBlueText"></i>
									<p>{{ __('AGENCY-INVOICES') }}</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('manage.collectInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.collectInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon blueText"></i>
									<p>{{ __('COLLECT-INVOICES') }}</p>
								</a>
							</li>
						@endif

						@if( in_array(session('uLvl'), ['AGENCY','AGENCYMODER', 'SUPPLIER', 'DRIVER']) )
							<li class="nav-item">
								<a href="{{ route('manage.serviceInvoices.index') }}" class="nav-link {{ request()->routeIs('manage.serviceInvoices.*') ? 'active' : false }}">
									<i class="fas fa-file-invoice-dollar nav-icon orangeText"></i>
									<p>{{ __('SERVICE-INVOICES') }}</p>
								</a>
							</li>
						@endif
					{{-- </ul>
				</li> --}}
				@endif

				{{-- <div class="listSeparator my-1"></div> --}}

				{{-- ACCOUNT --}}
				@if( in_array(session('uLvl'), array('AGENCY','SUPPLIER', 'DRIVER', 'CUSTOMER')) && false )
				{{-- <li class="nav-item has-treeview {{ request()->routeIs('manage.account.*') ? 'menu-open' : false }}">
					<a href="#" class="nav-link {{ request()->routeIs('manage.account.*') ? 'active' : false }}">
						<i class="nav-icon fas fa-user"></i>
						<p>
							{{ __('ACCOUNT') }}
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview"> --}}
						<li class="nav-item">
							<a href="{{ route('manage.account.index') }}" class="nav-link {{ request()->routeIs('manage.account.editAccount') ? 'active' : false }}">
								<i class="nav-icon fas fa-users-cog"></i>
								<p>{{ __('ACCOUNT') }}</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{ route('manage.account.about') }}" class="nav-link {{ request()->routeIs('manage.account.editAbout') ? 'active' : false }}">
								<i class="nav-icon fas fa-users-cog"></i>
								<p>{{ __('ABOUT') }}</p>
							</a>
						</li>
						
						@if( in_array(session('uLvl'), ['AGENCY','SUPPLIER']) )
							<li class="nav-item">
								<a href="{{ route('manage.account.username') }}" class="nav-link {{ request()->routeIs('manage.account.editUserName') ? 'active' : false }}">
									<i class="nav-icon fas fa-link"></i>
									<p>{{ __('USERNAME') }}</p>
								</a>
							</li>
						@endif

						<li class="nav-item">
							<a href="{{ route('manage.account.avatar') }}" class="nav-link {{ request()->routeIs('manage.account.editAvatar') ? 'active' : false }}">
								<i class="nav-icon fas fa-portrait"></i>
								<p>{{ __('AVATAR') }}</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{ route('manage.account.password') }}" class="nav-link {{ request()->routeIs('manage.account.editPassword') ? 'active' : false }}">
								<i class="nav-icon fas fa-shield-alt"></i>
								<p>{{ __('SECURITY') }}</p>
							</a>
						</li>
					{{-- </ul>
				</li> --}}
				@endif

				@if( session('uLvl')=='AGENCY' && false )
					<div class="listSeparator my-1"></div>
					<li class="nav-item">
						<a href="{{ route('manage.agencySettings.index') }}" class="nav-link {{ request()->routeIs('manage.agencySettings.edit') ? 'active' : false }}">
							<i class="nav-icon fas fa-cogs"></i>
							<p>{{ __('SETTINGS') }}</p>
						</a>
					</li>
					
				@endif

				@if( in_array(session('uLvl'), ['AGENCY', 'SUPPLIER']) && false )
					<div class="listSeparator my-1"></div>
					<li class="nav-item">
						<a href="{{ route('manage.staff.index') }}" class="nav-link {{ request()->routeIs('manage.staff.*') ? 'active' : false }}">
							<i class="nav-icon fa-solid fa-user-tie"></i>
							<p>{{ __('STAFF') }}</p>
						</a>
					</li>
				@endif

				@if( session('uLvl')=='SUPPLIER' && false )
				{{-- <li class="nav-item">
					<a href="{{ route('manage.supplierSettings.index') }}" class="nav-link {{ request()->routeIs('manage.supplierSettings.edit') ? 'active' : false }}">
						<i class="nav-icon fas fa-cogs"></i>
						<p>
							{{ __('SETTINGS') }}
						</p>
					</a>
				</li> --}}
				@endif

				@if( in_array(session('uLvl'), ['AGENCY', 'SUPPLIER']) && false )
					<div class="listSeparator my-1"></div>
					<li class="nav-item">
						<a href="{{ route('manage.driverCommissions.index') }}" class="nav-link {{ request()->routeIs('manage.driverCommissions.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-hand-holding-usd"></i>
							<p>{{ __('DRIVER-COMMISSIONS') }}</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="{{ route('manage.driversCommissionType.index') }}" class="nav-link {{ request()->routeIs('manage.driversCommissionType.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-tags"></i>
							<p>{{ __('DRIVER-COMMISSIONS-TYPE') }}</p>
						</a>
					</li>
				@endif

				@if( session('uLvl')=='DRIVER' && false )
					<div class="listSeparator my-1"></div>
					<li class="nav-item">
						<a href="{{ route('manage.driverZones.index') }}" class="nav-link {{ request()->routeIs('manage.driverZones.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-map-marker-alt"></i>
							<p>{{ __('DRIVER-ZONES') }}</p>
						</a>
					</li>
				@endif

				@if( session('uLvl')=='AGENCY' && false )
					<div class="listSeparator my-1"></div>
					<li class="nav-item">
						<a href="{{ route('manage.packagings.index') }}" class="nav-link {{ request()->routeIs('manage.packagings.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-box-open"></i>
							<p>{{ __('PACKAGINGS') }}</p>
						</a>
					</li>
				@endif

				@if( in_array(session('uLvl'), ['AGENCY']) && false )
					<div class="listSeparator my-1"></div>
					<li class="nav-item">
						<a href="{{ route('manage.commission.index') }}" class="nav-link {{ request()->routeIs('manage.commission.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-exclamation-triangle"></i>
							<p>{{ __('COMMISSION') }}</p>
						</a>
					</li>
				@endif

				@if( in_array(session('uLvl'), ['DRIVER']) && false )
					<div class="listSeparator my-1"></div>
					<li class="nav-item">
						<a href="{{ route('manage.promoters.index') }}" class="nav-link {{ request()->routeIs('manage.promoters.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-exclamation-triangle"></i>
							<p>{{ __('PROMOTERS') }}</p>
						</a>
					</li>
				@endif

				@if( session('uLvl')=='AGENCY' && false )
					<div class="listSeparator my-1"></div>
					<li class="nav-item">
						<a href="{{ route('manage.tariffs.index') }}" class="nav-link {{ request()->routeIs('manage.tariffs.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-tags"></i>
							<p>{{ __('TARIFFS') }}</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('manage.tariffCustoms.index') }}" class="nav-link {{ request()->routeIs('manage.tariffCustoms.*') ? 'active' : false }}">
							<i class="nav-icon fas fa-tags"></i>
							<p>{{ __('CUSTOM-TARIFFS') }}</p>
						</a>
					</li>
				@endif

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
