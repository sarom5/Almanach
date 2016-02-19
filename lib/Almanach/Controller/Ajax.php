<?php
class Almanach_Controller_Ajax extends Zikula_AbstractController
{
	/**
	 * @brief Set imaging status of one computer
	 * @param GET $cid The number of computer
	 * @param GET $imagingstatus status of imaging
	 *
	 * This function provides a simple soloutin to image much computers fast
	 *
	 * @author Sascha Rösler
	 * @version 1.0
	 */
	
	public function groupSave()
	{
		if (!SecurityUtil::checkPermission('Almanach::', '::', ACCESS_ADMIN))
			return new Zikula_Response_Ajax(LogUtil::registerPermissionError());

		$ok = 0;
		$name = FormUtil::getPassedValue('name', null, 'POST');
		$color = FormUtil::getPassedValue('color', null, 'POST');
		if(!$name)
			$text = ($this->__("There is no valid name!"));
			
		if($name)
		{
			$group = new Almanach_Entity_Group();
			$group->setName($name);
			$group->setColor($color);
			$this->entityManager->persist($group);
			$this->entityManager->flush();
			LogUtil::RegisterStatus($this->__("Group has been added successfully."));
			$ok = 1;
			$text = "";
		}
		
		$result['ok'] = $ok;
		$result['text'] = $text;
		$result['gid'] = $group->getGid();
		$result['color'] = $group->getColor();

    	$result["newGroup"] = $this->view
    		->assign('group', $group)
    		->fetch('Ajax/newGroupEntity.tpl');
    	
		return new Zikula_Response_Ajax($result);
	}
	
	public function groupDel()
	{
		if (!SecurityUtil::checkPermission('Almanach::', '::', ACCESS_ADMIN))
			return new Zikula_Response_Ajax(LogUtil::registerPermissionError());

		$result['ok'] = 0;
		$id = FormUtil::getPassedValue('id', null, 'POST');
		if(!isset($id)) {
			return new Zikula_Response_Ajax_BadData($this->__('missing $id'));
		}
		if($id)
		{
			$colors = $this->entityManager->getRepository('Almanach_Entity_Color')->findBy(array('gid'=>$id));
			foreach($colors as $color){
				$this->entityManager->remove($color);
				$this->entityManager->flush();
			}
			
			$dates = $this->entityManager->getRepository('Almanach_Entity_Date')->findBy(array('gid'=>$id));
			foreach($dates as $date){
				$this->entityManager->remove($date);
				$this->entityManager->flush();
			}
			
			$group = $this->entityManager->find('Almanach_Entity_Group', $id);
			$this->entityManager->remove($group);
			$this->entityManager->flush();
			LogUtil::RegisterStatus($this->__("Group has been removed successfully."));
		}
		
		$result['id'] = $id;
		return new Zikula_Response_Ajax($result);
	}
	
	
	
	public function groupEdit()
	{
		if (!SecurityUtil::checkPermission('Almanach::', '::', ACCESS_ADMIN))
			return new Zikula_Response_Ajax(LogUtil::registerPermissionError());

		$ok = 0;
		$text = "";
		$name = FormUtil::getPassedValue('name', null, 'POST');
		$gid = FormUtil::getPassedValue('gid', null, 'POST');
		$color = FormUtil::getPassedValue('color', null, 'POST');
		if(!$name)
			$text = ($this->__("There is no valid name!"));
		if(!$gid)
			$text = ($this->__("There is no valid id!"));
		if($name && $gid)
		{
			$group = $this->entityManager->find('Almanach_Entity_Group', $gid);
			$group->setName($name);
			$group->setColor($color);
			$this->entityManager->persist($group);
			$this->entityManager->flush();
			$ok = 1;
		}
		
		$result['ok'] = $ok;
		$result['text'] = $text;
		$result['name'] = $name;
		$result['color'] = $color;
		return new Zikula_Response_Ajax($result);
	}
	
	public function almanachDel()
	{
		if (!SecurityUtil::checkPermission('Almanach::', '::', ACCESS_ADMIN))
			return new Zikula_Response_Ajax(LogUtil::registerPermissionError());

		$result['ok'] = 0;
		$id = FormUtil::getPassedValue('id', null, 'POST');
		if(!isset($id)) {
			return new Zikula_Response_Ajax_BadData($this->__('missing $id'));
		}
		if($id)
		{
			$colors = $this->entityManager->getRepository('Almanach_Entity_Color')->findBy(array('aid'=>$id));
			foreach($colors as $color){
				$this->entityManager->remove($color);
				$this->entityManager->flush();
			}
			
			$heredities = $this->entityManager->getRepository('Almanach_Entity_Heredity')->findBy(array('paid'=>$id));
			foreach($heredities as $heredity){
				$this->entityManager->remove($heredity);
				$this->entityManager->flush();
			}
			
			$heredities = $this->entityManager->getRepository('Almanach_Entity_Heredity')->findBy(array('caid'=>$id));
			foreach($heredities as $heredity){
				$this->entityManager->remove($heredity);
				$this->entityManager->flush();
			}
			
			$connections = $this->entityManager->getRepository('Almanach_Entity_AlmanachElement')->findBy(array('aid'=>$id));
			foreach($connections as $connection){
				$this->entityManager->remove($connection);
				$this->entityManager->flush();
			}
			
			$subscitions = $this->entityManager->getRepository('Almanach_Entity_SubscribeAlmanach')->findBy(array('aid'=>$id));
			foreach($subscitions as $subscition){
				$this->entityManager->remove($subscition);
				$this->entityManager->flush();
			}
			
			$almanach = $this->entityManager->find('Almanach_Entity_Almanach', $id);
			$this->entityManager->remove($almanach);
			$this->entityManager->flush();
			LogUtil::RegisterStatus($this->__("Almanach has been removed successfully."));
		}
		
		$result['id'] = $id;
		return new Zikula_Response_Ajax($result);
	}
}