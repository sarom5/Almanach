<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Ministrants entity class.
 *
 * Annotations define the entity mappings to database.
 *
 * @ORM\Entity
 * @ORM\Table(name="Almanach_Date")
 */
class Almanach_Entity_Date extends Zikula_EntityAccess
{

    /**
     * The following are annotations which define the id field.
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $did;
    
    /**
     * The following are annotations which define the start date field.
     *
     * @ORM\Column(type="datetime")
     */
    private $startdate;
    
    /**
     * The following are annotations which define the end date field.
     *
     * @ORM\Column(type="datetime")
     */
    private $enddate;
    
    /**
     * The following are annotations which define the show field of the end date.
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $showenddate = 1;
    
    /**
     * The following are annotations which define the group id field.
     *
     * @ORM\Column(type="integer")
     */
    private $gid;
    
    /**
     * The following are annotations which define the title field.
     *
     * @ORM\Column(type="string", length="200")
     */
    private $title;
    
    /**
     * The following are annotations which define the description field.
     *
     * @ORM\Column(type="string", length="4000", nullable=true)
     */
    private $description;
    
    /**
     * The following are annotations which define the description field.
     *
     * @ORM\Column(type="string", length="200", nullable=true)
     */
    private $shortDescription;

    /**
     * The following are annotations which define the location field.
     *
     * @ORM\Column(type="string", length="1000", nullable=true)
     */
    private $location;
    
    /**
     * The following are annotations which define the color field in html color code.
     *
     * @ORM\Column(type="string", length="7", nullable=true)
     */
    private $color;
    
    /**
     * The following are annotations which define the visibility field.
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $visibility;
    
    /**
     * The following are annotations which define the guest field.
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $guests;
    
    /**
     * The following are annotations which define the userid field.
     *
     * @ORM\Column(type="integer")
     */
    private $uid;
    
    /**
     * The following are annotations which define the show field of the user id.
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $showuid = 1;
    
    /**
     * The following are annotations which define the creation date field.
     *
     * @ORM\Column(type="datetime")
     */
    private $creationdate;
    
    //no database field:
    private $nextAlmanach;
    
    public function getDid()
    {
        return $this->did;
    }
    
    public function getStartdate()
    {
        return $this->startdate;
    }
    
    public function getStartdateFormatted()
    {
    	if($this->startdate)
        	return $this->startdate->format('d.m.Y H:i');
        else
        	return null;
    }
    
    public function getStartdateFormattedout()
    {
    	if($this->startdate){
			$trans = array(
				'Monday'    => 'Montag',
				'Tuesday'   => 'Dienstag',
				'Wednesday' => 'Mittwoch',
				'Thursday'  => 'Donnerstag',
				'Friday'    => 'Freitag',
				'Saturday'  => 'Samstag',
				'Sunday'    => 'Sonntag',
				'Mon'       => 'Mo',
				'Tue'       => 'Di',
				'Wed'       => 'Mi',
				'Thu'       => 'Do',
				'Fri'       => 'Fr',
				'Sat'       => 'Sa',
				'Sun'       => 'So',
				'January'   => 'Januar',
				'February'  => 'Februar',
				'March'     => 'März',
				'May'       => 'Mai',
				'June'      => 'Juni',
				'July'      => 'Juli',
				'October'   => 'Oktober',
				'December'  => 'Dezember',
				'Jan'   => 'Jan',
				'Feb'  => 'Feb',
				'Mar'     => 'März',
				'May'      => 'Mai',
				'Oct'   => 'Okt',
				'Dec'  => 'Dez',
			);
			$weekday = $this->startdate->format('D');
			$weekday = strtr($weekday, $trans);  
			$date = $this->startdate->format(' d. M Y, H:i');
			$date = strtr($date, $trans);  
		    return $weekday . ",<nobr>" . $date . "</nobr> Uhr" ;
	    }
	    else{
	    	return null;
	    }
    }
    
    public function setStartdate($startdate)
    {
        $this->startdate = new \Datetime($startdate);
    }

	public function getEnddate()
    {
        return $this->enddate;
    }
    
    public function getEnddateFormatted()
    {
        if($this->enddate)
        	return $this->enddate->format('d.m.Y H:i');
        else
        	return null;
    }
    
    public function getEnddateFormattedout()
    {
    	if($this->enddate){
			$trans = array(
				'Monday'    => 'Montag',
				'Tuesday'   => 'Dienstag',
				'Wednesday' => 'Mittwoch',
				'Thursday'  => 'Donnerstag',
				'Friday'    => 'Freitag',
				'Saturday'  => 'Samstag',
				'Sunday'    => 'Sonntag',
				'Mon'       => 'Mo',
				'Tue'       => 'Di',
				'Wed'       => 'Mi',
				'Thu'       => 'Do',
				'Fri'       => 'Fr',
				'Sat'       => 'Sa',
				'Sun'       => 'So',
				'January'   => 'Januar',
				'February'  => 'Februar',
				'March'     => 'März',
				'May'       => 'Mai',
				'June'      => 'Juni',
				'July'      => 'Juli',
				'October'   => 'Oktober',
				'December'  => 'Dezember',
				'Jan'   => 'Jan',
				'Feb'  => 'Feb',
				'Mar'     => 'März',
				'May'      => 'Mai',
				'Oct'   => 'Okt',
				'Dec'  => 'Dez',
			);
			
			if($this->enddate->format(' d. M. Y') == $this->startdate->format(' d. M. Y')){
				return $this->enddate->format('H:i') . " Uhr";
			}
			$weekday = $this->enddate->format('D');
			$weekday = strtr($weekday, $trans);  
			$date = $this->enddate->format(' d. M Y,  H:i');
			$date = strtr($date, $trans);  
		    return $weekday . ",<nobr>" . $date . "</nobr> Uhr" ;
	    }
	    else{
	    	return null;
	    }
    }
    
    public function setEnddate($enddate)
    {
        $this->enddate = new \Datetime($enddate);
    }
    
    public function getShowEnddate()
    {
        return $this->showenddate;
    }
    
    public function setShowEnddate($showenddate)
    {
        $this->showenddate = $showenddate;
    }
    
    public function getGid()
    {
        return $this->gid;
    }
    
    public function getGroupName()
    {
        return ModUtil::apiFunc('Almanach', 'Admin', 'getGroupName', array('gid' => $this->gid));
    }
    
    public function getGroupColor()
    {
        return ModUtil::apiFunc('Almanach', 'Admin', 'getGroupColor', array('gid' => $this->gid));
    }
    
    public function setGid($gid)
    {
        $this->gid = $gid;
    }
    
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    public function setShortDescription($description)
    {
        $this->shortDescription = $description;
    }
    
    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }
    
    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }
    
    public function getVisibility()
    {
        return $this->visibility;
    }

    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }
    
    public function getGuests()
    {
        return $this->guests;
    }

    public function setGuests($guests)
    {
        $this->guests = $guests;
    }
    
    public function getUid()
    {
        return $this->uid;
    }

	public function getUserName()
    {
        return ModUtil::apiFunc('Almanach', 'Admin', 'getContactPerson', array('uid' => $this->uid));
    }
    
    public function setUid($uid)
    {
        $this->uid = $uid;
    }
    
    public function getShowUid()
    {
        return $this->showuid;
    }
    
    public function setShowUid($showuid)
    {
        $this->showuid = $showuid;
    }
    
    public function getCreationdate()
    {
        return $this->creationdate;
    }

    public function setCreationdate($creationdate)
    {
   		$this->creationdate = new \Datetime($creationdate);
    }
    
    public function getCreationdateFormatted()
    {
        if($this->creationdate)
        	return $this->creationdate->format('d.m.Y  H:i');
        else
        	return null;
    }
    
    public function getCreationdateFormattedout()
    {
    	if($this->creationdate){
			$trans = array(
				'Monday'    => 'Montag',
				'Tuesday'   => 'Dienstag',
				'Wednesday' => 'Mittwoch',
				'Thursday'  => 'Donnerstag',
				'Friday'    => 'Freitag',
				'Saturday'  => 'Samstag',
				'Sunday'    => 'Sonntag',
				'Mon'       => 'Mo',
				'Tue'       => 'Di',
				'Wed'       => 'Mi',
				'Thu'       => 'Do',
				'Fri'       => 'Fr',
				'Sat'       => 'Sa',
				'Sun'       => 'So',
				'January'   => 'Januar',
				'February'  => 'Februar',
				'March'     => 'März',
				'May'       => 'Mai',
				'June'      => 'Juni',
				'July'      => 'Juli',
				'October'   => 'Oktober',
				'December'  => 'Dezember',
				'Jan'   => 'Jan',
				'Feb'  => 'Feb',
				'Mar'     => 'März',
				'May'      => 'Mai',
				'Oct'   => 'Okt',
				'Dec'  => 'Dez',
			);
			$weekday = $this->creationdate->format('D');
			$weekday = strtr($weekday, $trans);  
			$date = $this->creationdate->format(' d. M Y, H:i');
			$date = strtr($date, $trans);  
		    return $weekday . ",<nobr>" . $date . "</nobr>" . " Uhr" ;
	    }
	    else{
	    	return null;
	    }
    }
    
    public function getNextAlmanach()
    {
        return $this->nextAlmanach;
    }

    public function setNextAlmanach($nextAlmanach)
    {
   		$this->nextAlmanach = $nextAlmanach;
    }
    
    public function __clone(){}
}
