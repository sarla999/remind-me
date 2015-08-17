# remind-me


remind me todo somethins


###a.提醒功能
	1.底层功能实现(完成)
	2.展示提醒（完成）
	3.数据录入功能（完成）
	4.前台数据展示模板及录入表格（完成）
	5.框架整理(完成)
	6.提醒功能开发(mail,sms,app)
	7.多用户使用改进
	8.用户访问控制



###b.收藏夹功能实现（空间不支持laravel）
	1.公共------意见反馈
		a.数据表设计(done)
			sso.common.feedback
			id(主键) username useragent time ip comment status(处理和未处理)
		b.功能实现(done)
		c.页面嵌套
	2.收藏功能
		a.用户数据表设计(done)
			sso.common.member
			id(p key) username phone passwd regtime ip logintime status 
		b.收藏数据表设计(inprocess)
			id(p key) uid name location tags notes public status addtime updatetime
		c.标签数据表设计(done)
			sso.common.tags
			id(p key) tagname father reference addtime
		d.登录功能实现(done)
		c.收藏功能实现(inprocess)
		e.页面嵌套




###c.应用分类
	1.底层功能
	

