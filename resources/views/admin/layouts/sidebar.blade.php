<div class="sidebar pt-4 d-none d-md-inline col-md-2 bgSide">
	<div class="wrapperSidebar">
		<a href="{{route('admin.home')}}" class="sidebarLink">
			<i class="fa fa-home"></i>
			<span>خانه</span>
		</a>
		<div class="divider">بخش فروش</div>
		<div class="sideMenuToggle">
			<div class="toggleTitle d-flex justify-content-between pointer">
				<span>
					<i class="fas fa-chart-bar"></i>
					<span>ویترین</span>
				</span>
				<i class="angel fa fa-angle-left"></i>
			</div>
			<div class="sMenu toggleMenu">
				<a href="{{ route('admin.market.category.index') }}" class="sidebarLinkToggle">دسته بندی</a>
				<a href="{{ route('admin.market.property.index') }}" class="sidebarLinkToggle">فرم محصول</a>
				<a href="{{ route('admin.market.brand.index') }}" class="sidebarLinkToggle">برندها</a>
				<a href="{{ route('admin.market.product.index') }}" class="sidebarLinkToggle">محصولات</a>
				<a href="{{ route('admin.market.store.index') }}" class="sidebarLinkToggle">انبار</a>
				<a href="{{ route('admin.market.comment.index')}}" class="sidebarLinkToggle">نظرات</a>
			</div>
		</div>
		<div class="sideMenuToggle">
			<div class="toggleTitle d-flex justify-content-between pointer">
				<span>
					<i class="fas fa-chart-bar"></i>
					<span>سفارشات</span>
				</span>
				<i class="angel fa fa-angle-left"></i>
			</div>
			<div class="sMenu toggleMenu">
				<a href="{{ route('admin.market.order.new') }}" class="sidebarLinkToggle"> جدید</a>
				<a href="{{ route('admin.market.order.sending') }}" class="sidebarLinkToggle">در حال ارسال</a>
				<a href="{{ route('admin.market.order.unpaid') }}" class="sidebarLinkToggle">پرداخت نشده</a>
				<a href="{{ route('admin.market.order.canceled') }}" class="sidebarLinkToggle">باطل شده</a>
				<a href="{{ route('admin.market.order.returned') }}" class="sidebarLinkToggle">مرجوعی</a>
				<a href="{{ route('admin.market.order.allOrder') }}" class="sidebarLinkToggle">تمام سفارشات</a>
			</div>
		</div>
		<div class="sideMenuToggle">
			<div class="toggleTitle d-flex justify-content-between pointer">
				<span>
					<i class="fas fa-chart-bar"></i>
					<span>پرداخت ها</span>
				</span>
				<i class="angel fa fa-angle-left"></i>
			</div>
			<div class="sMenu toggleMenu">
				<a href="{{ route('admin.market.payment.index') }}" class="sidebarLinkToggle">تمام پرداخت ها</a>
				<a href="{{ route('admin.market.payment.online') }}" class="sidebarLinkToggle">پرداخت های آنلاین</a>
				<a href="{{ route('admin.market.payment.offline') }}" class="sidebarLinkToggle">پرداخت های آفلاین</a>
				<a href="{{ route('admin.market.payment.cash') }}" class="sidebarLinkToggle">پرداخت در محل</a>
			</div>
		</div>
		<div class="sideMenuToggle">
			<div class="toggleTitle d-flex justify-content-between pointer">
				<span>
					<i class="fas fa-chart-bar"></i>
					<span>تخفیف ها</span>
				</span>
				<i class="angel fa fa-angle-left"></i>
			</div>
			<div class="sMenu toggleMenu">
				<a href="{{ route('admin.market.discount.copan')}}" class="sidebarLinkToggle">کپن تخفیف</a>
				<a href="{{ route('admin.market.discount.common')}}" class="sidebarLinkToggle">تخفیف عمومی</a>
				<a href="{{ route('admin.market.discount.amazingSale')}}" class="sidebarLinkToggle">فروش شگفت انگیز</a>
			</div>
		</div>
		<a href="{{ route('admin.market.delivery.index')}}" class="sidebarLink">
			<i class="fa fa-truck"></i>
			<span>روش های ارسال</span>
		</a>
		<div class="divider">بخش محتوی</div>
		<a href="{{ route('admin.content.category.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>دسته بندی</span>
		</a>
		<a href="{{ route('admin.content.post.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>مقالات</span>
		</a>
		<a href="{{ route('admin.content.comment.index') }}" class="sidebarLink">
			<i class="fa fa-comments"></i>
			<span>نظرات</span>
		</a>
		<a href="{{ route('admin.content.menu.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>منو</span>
		</a>
		<a href="{{ route('admin.content.faq.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>سوالات متداول</span>
		</a>
		<a href="{{ route('admin.content.page.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>پیج ساز</span>
		</a>
		<a href="{{ route('admin.content.banner.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>بنر ها</span>
		</a>
		<div class="divider">بخش کاربران</div>
		<a href="{{ route('admin.user.admin-user.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>کاربران ادمین</span>
		</a>
		<a href="{{ route('admin.user.customer.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>مشتریان</span>
		</a>
		<a href="{{ route('admin.user.role.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>سطوح دسترسی</span>
		</a>
		<div class="divider">تیکت ها</div>
		<a href="{{ route('admin.ticket.category.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>دسته بندی تیکت ها</span>
		</a>
		<a href="{{ route('admin.ticket.priority.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>اولویت تیکت ها</span>
		</a>
		<a href="{{ route('admin.ticket.admin.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>ادمین تیکت ها</span>
		</a>
		<a href="{{ route('admin.ticket.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>همه تیکت ها</span>
		</a>
		<a href="{{ route('admin.ticket.new-ticket') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>تیکت های جدید</span>
		</a>
		<a href="{{ route('admin.ticket.open-ticket') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>تیکت های باز</span>
		</a>
		<a href="{{ route('admin.ticket.close-ticket') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>تیکت های بسته</span>
		</a>
		<div class="divider">اطلاع رسانی</div>
		<a href="{{ route('admin.notify.email.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>اعلامیه ایمیلی</span>
		</a>
		<a href="{{ route('admin.notify.sms.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>اعلامیه پیامکی</span>
		</a>
		<div class="divider">تنظیمات</div>
		<a href="{{ route('admin.setting.index') }}" class="sidebarLink">
			<i class="fas fa-bars"></i>
			<span>تنظیمات</span>
		</a>
	</div>
</div>
