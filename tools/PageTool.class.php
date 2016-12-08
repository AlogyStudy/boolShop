<?php

	/**
	 * 分页类
	 */
	
	/**
	 * 商品数据 共 5 条 ， 每页 显示 2条
	 * 
	 * 共几页?
	 * 共3页， 因为页数是整的.
	 * 
	 * 第一页显示第几条到第几条?
	 * 1-2 条 
	 * 
	 * 第二页显示第几条到第几条?
	 * 3-4 条
	 *
	 *  // ------
	 * 
	 * 分页原理的三个变量：
	 * 总条目 $total
	 * 每页条数 $perpage
	 * 当前页  $page
	 * 
	 * 分页原理2个公式：
	 * 总页数 $cnt = ceil($total / $perpage);
	 * 
	 * 第 $page页 ， 显示  第几条 到第几条?
	 * 第 $page 页，说明前面已经翻过$page-1页，每页是 $perpage条
	 * 所以：跳过了 ($page-1) * $perpage 条.
	 * 即，从  ($page-1) * $perpage+1 条 开始取， 取$perpage 条出来
	 *
	 * 
	 * 分页导航的生成
	 * @exp 
	 * category.php?cat_id=3&page=1
	 * 
	 * 存在可能情况
	 * 1. category.php
	 * 2. category.php?cat_id=2
	 * 3. category.php?page=1 
	 * 
	 * 需要小心保护参数
	 * 分页导航中:
	 * [1] [2] 3 [4] [5] 
	 * page参数 应该根据当前的页码来生成，但同时不能把其它参数弄丢，如$cat_id
	 * 
	 * 
	 * 所以，需要先把地址栏的参数获取，并保存起来.(防止丢失)
	 * 
	 * 
	 * 1. 保存参数
	 * 2. 计算导航链接
	 */
	
//	defined('ACC') || exit('ACC Denied');	
	
	class PageTool {
		
		protected $total = 0;  // 总条数
		protected $perpage = 10; // 每页条数  默认显示10条
		protected $page = 1; // 当前页  默认处于第一页
		
		/**
		 * 设置 分页类需要的 
		 * `总条数`
		 * `每页显示条数`
		 * `当前页`
		 * 等参数
		 */
		public function __construct( $total, $perpage=false, $page=false ) {
			
			$this->total = $total;
			
			if ( $perpage ) {
				$this->perpage = $perpage;
			}
			if ( $page ) {
				$this->page = $page;
			}
			
		} 
		
		/**
		 * 创建分页导航
		 */
		public function show() {
			
			// $this->perpage 不为 0
			if ( !$this->perpage ) {
				$cnt = ceil($this->total / $this->perpage); // 总页数
			}
			
			// 保存 地址栏的信息
			$uri = $_SERVER['REQUEST_URI'];
			$parse = parse_url($uri);
			
			$param = array();
			if ( isset($parse['query']) ) {
				parse_str($parse['query'], $param);
			}
			
			// 不管$param数组中是否存在 page单元，都unset一下，确保没有page单元，即保存出page之外的所有单元
			unset($param['page']);
			
			// 计算页码导航
			$url = $parse['path'] . '';
			
							
			
		}
	} 		 

	$p = new PageTool(100);
	
	$p->show();

?>