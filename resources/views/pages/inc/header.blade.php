


<nav class="bg-white border-gray-200 dark:bg-gray-900" id="mobile">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img width="1400" height="159" src="{{ asset('public/media/logo.png') }}"  class="h-8" 
              alt="" loading="lazy" style="border-radius: 20px;width: 100px;height: 74px;" />
            </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="{{ route('homepage') }}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">HOME</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">INNOVATIONS</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">RESOURCES</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">PUBLICATIONS</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">CONTACT</a>
        </li>
        
        <li>
          <a href="/login" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">LOGIN</a>
        </li>
      </ul>
    </div>
  </div>
</nav>









<div class="stm-header">
    <div class="stm-header__row_color stm-header__row_color_top">
      <div class="container">
        <div class="stm-header__row stm-header__row_top">
          <div class="stm-header__cell stm-header__cell_center">
            <div class="stm-header__element stm-header__element_">
              <div class="stm-iconbox">
                <i class="stm-iconbox__icon mtc stm-iconbox__icon_left icon_22px fa fa-clock-o" style="margin-top: -13px"></i>
                <div class="stm-iconbox__info" style="margin-top: -20px;">
                  <div class="stm-iconbox__text stm-iconbox__text_nomargin">
                    Mon - Friday 8.00 - 17.00 </div>

                  <div class="stm-iconbox__description">
                    Saturday and Sunday CLOSED </div>

                </div>
              </div>


            </div>
            <div class="stm-header__element object2773 stm-header__element_">
              <div class="stm-iconbox">
                <i class="stm-iconbox__icon mtc stm-iconbox__icon_left icon_22px stmicon-bb_pin"></i>
                <div class="stm-iconbox__info">
                  <div class="stm-iconbox__text stm-iconbox__text_nomargin">
                    6th Floor, Hill Plaza Building Ngong Road , Nairobi, Kenya </div>

                  <div class="stm-iconbox__description">
                    P.O. Box 30028-00100 Kenya </div>

                </div>
              </div>


            </div>

          </div>
          <div class="stm-header__cell stm-header__cell_right">
            <div class="stm-header__element object723 stm-header__element_">
              <div class="stm-socials">
                <a href="fb.com" class="stm-socials__icon icon_16px stm-socials__icon_round" target="_blank">
                  <i class="fa fa-facebook"></i>
                </a>
                <a href="twitter.com" class="stm-socials__icon icon_16px stm-socials__icon_round" target="_blank">
                  <i class="fa fa-twitter"></i>
                </a>
                <a href="instagram.com" class="stm-socials__icon icon_16px stm-socials__icon_round" target="_blank">
                  <i class="fa fa-instagram"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="stm-header__row_color ">
      <div class="container">

        <div class="stm-header__row stm-header__row_bottom">
          <a href="{{ route('homepage') }}" title="">
            <img width="1400" height="159" src="{{ asset('public/media/logo.png') }}" class="logo"
              alt="" loading="lazy" style="width:150px; border-radius: 20px" /> </a>
          <div class="stm-header__cell stm-header__cell_center">
            <div class="stm-header__element object1538 stm-header__element_fullwidth">

              <div
                class="stm-navigation tbc heading_font stm-navigation__default stm-navigation__fullwidth stm-navigation__line_top stm-navigation__">



                <ul>
                  <li id=""
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-15 current_page_item">
                    <a href="{{ route('homepage') }}" aria-current="page">HOME</a>
                  </li>
                  <li id=""
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-15">
                    <a href="#" aria-current="page">INNOVATIONS</a>
                  </li>
                  <li id="" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children ">
                    <a href="">RESOURCES</a>
                    <ul class="sub-menu">
                      <li id=""
                        class="menu-item menu-item-type-post_type menu-item-object-page  stm_mega_cols_inside_default">
                        <a href="#">Publications</a>
                      </li>
                      <li id=""
                        class="menu-item menu-item-type-post_type menu-item-object-page  stm_mega_cols_inside_default">
                        <a href="#">Success Stories</a>
                      </li>
                    </ul>
                  </li>

                  <li id=""
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-15">
                    <a href="#" aria-current="page">CONTACT</a>
                  </li>

                  <li id=""
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-15">
                    <a href="login" aria-current="page">LOGIN</a>
                  </li>
                </ul>


                <div class="stm-iconbox" style="color: #fff">
                  <i class="stm-iconbox__icon mtc stm-iconbox__icon_left icon_22px stmicon-bb_phone fa fa-phone"></i>
                  <div class="stm-iconbox__info">
                    <div class="stm-iconbox__text stm-iconbox__text_nomargin">
                      +254724256157 </div>

                    <div class="stm-iconbox__description">
                      Head Office </div>

                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>