
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
	<li @if(Route::is('dashboard')) class="active nav-item" @else class="nav-item" @endif>
    <a href="{{route('dashboard')}}"><i class="la la-home"></i>
      <span class="menu-title">الرئيسية</span>
    </a>
  </li>

  <li @if(Route::is('category') || Route::is('product') || Route::is('price_list') || Route::is('price_product') || Route::is('price_product.create')) class="active nav-item" @else class="nav-item" @endif><a href="#"><i class="la la-cubes"></i><span class="menu-title" data-i18n="nav.dash.main">المنتجات</span></a>
    <ul class="menu-content">
      <li @if(Route::is('category') ) class="active" @endif><a class=" menu-item" href="{{route('category')}}" data-i18n="nav.dash.crypto"><i class="la la-bar-chart-o"></i> ا لاصناف</a>
      </li>
      <li @if(Route::is('product')) class="active" @endif><a class="menu-item" href="{{route('product')}}" data-i18n="nav.dash.ecommerce"><i class="la la-cubes"></i> المنتجات</a>
      </li>
      <li @if(Route::is('price_product') || Route::is('price_list') || Route::is('price_product.create')) class="active" @endif><a class="menu-item" href="{{route('price_list')}}" data-i18n="nav.dash.sales"> <i class="la la-money"></i>قائمة الاسعار</a>
      </li>
    </ul>
  </li>

  <li @if(Route::is('gov_manag') || Route::is('sales_manag') || Route::is('cust_servi_manag') || Route::is('supplier') || Route::is('merchant') || Route::is('distributer') || Route::is('technician') || Route::is('customer'))class="open nav-item" @else class=" nav-item" @endif><a href="#"><i class="la la-group"></i><span class="menu-title" data-i18n="nav.dash.main"> المستخدمين</span></a>
    <ul class="menu-content">
      <li class="{{ request()->is('governorate_managers') ? 'active' : '' }}"><a class="menu-item" href="{{route('gov_manag')}}" data-i18n="nav.dash.ecommerce"><i class="la la-user"></i>مديرين المحافظات</a>
      </li>
      <li @if(Route::is('sales_manag')) class="active" @endif><a class="menu-item" href="{{route('sales_manag')}}" data-i18n="nav.dash.crypto"><i class="la la-user"></i>مديرين البيع</a>
      </li>
      <li @if(Route::is('cust_servi_manag')) class="active" @endif><a class="menu-item" href="{{route('cust_servi_manag')}}" data-i18n="nav.dash.sales"><i class="la la-user"></i>مديرن خدمة العملاء </a>
      </li>
      <li class="{{ request()->is('salesrepresentatives') ? 'active' : '' }}"><a class="menu-item" href="{{ route('salesrepresentatives.index') }}" data-i18n="nav.dash.sales"><i class="la la-user"></i>مناديب البيع</a>
      </li>
      <li class="{{ request()->is('cs_representative') ? 'active' : '' }}"><a class="menu-item" href="{{ route('cs_representative.index') }}" data-i18n="nav.dash.sales"><i class="la la-user"></i> مناديب خدمة العملاء </a>
      </li>
      <!-- <li @if(Route::is('supplier')) class="active" @endif><a class="menu-item" href="{{route('supplier')}}" data-i18n="nav.dash.sales"><i class="la la-user"></i> الموردين </a> -->
      </li>
      <li @if(Route::is('distributer')) class="active" @endif><a class="menu-item" href="{{route('distributer')}}" data-i18n="nav.dash.sales"><i class="la la-user"></i> الموزعين </a>
      </li>
      <li @if(Route::is('merchant')) class="active" @endif><a class="menu-item" href="{{route('merchant')}}" data-i18n="nav.dash.sales"><i class="la la-user"></i> التجار </a>
      </li>
      <li @if(Route::is('technician')) class="active" @endif><a class="menu-item" href="{{route('technician')}}" data-i18n="nav.dash.sales"><i class="la la-user"></i> الفنين </a>
      </li>
      <li @if(Route::is('customer')) class="active" @endif><a class="menu-item" href="{{route('customer')}}" data-i18n="nav.dash.sales"><i class="la la-user"></i> العملاء </a>
      </li>
    </ul>
  </li>

  </li>
  <li @if(Route::is('gift')) class="active nav-item" @else class="nav-item" @endif>
    <a href="{{route('gift')}}"><i class="la la-archive"></i>
      <span class="menu-title" data-i18n="nav.support_documentation.main"> الهدايا</span>
    </a>
  </li>
  <li class=" nav-item"><a href="#"><i class="la la-location-arrow"></i><span class="menu-title" data-i18n="nav.dash.main">المناطق</span></a>
    <ul class="menu-content">
      </li>
      <li @if(Route::is('governorates.index')) class="active" @endif><a class="menu-item" href="{{route('governorates.index')}}" data-i18n="nav.dash.crypto"><i class="la la-building"></i> المحافظات</a>
      </li>
      <li @if(Route::is('states.index')) class="active" @endif><a class="menu-item" href="{{route('states.index')}}" data-i18n="nav.dash.crypto"><i class="la la-building"></i> المراكز</a>
      </li>
    </ul>
  </li>
  <li class=" nav-item">
    <a href="#">
      <span class="menu-title" data-i18n="nav.support_documentation.main"><i class="la la-paste"></i> المعاينات</span>
    </a>
  </li>
  <li class=" nav-item">
    <a href="#">
      <span class="menu-title" data-i18n="nav.support_documentation.main"><i class="la la-tags"></i>كوبونات</span>
    </a>
  </li>
  <li @if(Route::is('complaint')) class="active nav-item" @else class="nav-item" @endif>
    <a href="{{route('complaint')}}">
      <span class="menu-title" data-i18n="nav.support_documentation.main"><i class="la la-calendar-times-o"></i> الشكاوى</span>
    </a>
  </li>
  <li @if(Route::is('task')) class="active nav-item" @else class="nav-item" @endif>
    <a href="{{route('task')}}"><i class="la la-check-square-o"></i>
      <span class="menu-title" data-i18n="nav.support_documentation.main">المهمات</span>
    </a>
  </li>
</ul>
