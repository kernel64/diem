  public function executeIndex(sfWebRequest $request)
  {
    // searching
    if ($request->hasParameter('search'))
    {
      $this->setSearch($request->getParameter('search'));
      $request->setParameter('page', 1);
    }
    
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
    
    $this->security_manager = $this->getDmModule()->getSecurityManager(); //getActionSecurizationStrategy()->setRecordsPermissions($this->getUser()->getUser()->getTable()->getRecordsPermissionsByRecord(array('module' => $this->getModuleName(), 'model' => '<?php echo $this->getModelClass() ?>'), $this->getUser()->getUser(), $this->pager->getMaxPerPage())); 
  }
