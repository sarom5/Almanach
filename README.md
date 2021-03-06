Almanach
========
This is a calendar module for zikula. You can create a lot of calendars, witch inherits from each other. There are groups as smalest entity, too. Every date can belongs to a group and can be entered in one ore more calendars. Dates can be colored, too. There is a ranking of different color modes. You can read more in Color- Ranking below.

#Installation
You can download this module and instal it via the zikula- interface.

This module needs data- fields in the profile module. Before you install the module you set if Profile fields should be create by the installer. If you input NONE you has to create the fields manuelly by Profile and set the fieldnames manuelly via the "General Settings"-tab.

#Getting Started!

Before you begin to work with the module, you should have a loog to the general settings:

#General Settings
In the "General Settings"-tab you can set the time in days when dates are deleted automaticly. The standard setting is three years (that are 1095 days). Then you can descide if user not having the ACCESS_ADMIN-permission can give their dates custom colors. This can be a problem, if the all dates of a group has to be in the same color. After that there are three fields where you have to input the name of the Profile-fields where people has to input their real first- and surname and their form of address. This data it inportant to give the contact person to a date.


At first you should create a group:

#Groups
Groups are the smalest entity of the calendar. You can create a group in the 'Group'- tap. You can choose a color for all datse of the group. The date is colored in this color, if there isn't another color for the calendar or the date. Via permissionruels in zikula you can decide, which person can create dates for which group.

In the next Step you should create a calendar:

##Calendars
The calendats or almanachs hold dates. You can create them via the 'Calendar'-tab. You have to input a name for the calendar. Next you can decide if dates can entered in this calendar. If not, the calendar only holds dates given by another calendar. You can descide if there can be two dates at the same time. This is called overlapping. If you want, that dates can overlap you have to put the hook. If you want, you can set an extra template to show this calendar.

After setting the general setting of the calendar, you can choose calendars, which are part of this calendar. You can choose a calendar in the dropdown- list and click to 'new Heredity'. In the dropdown list, there are all calendars, which are not part of this calendar. There aren't calendars having this calendar as part of. 

For each heredity you can choose a color. Each date being part of the other calendar gets the new color for this calendar. If you dont want to overwrite the dates color, you dont input a new color.

You can set extra colors for the date of special groups for this calendar. You can choose the group in the group-dropdown-lost and set a color to the group. All dates of this group gets a new color in this calendar and each calendar having this one as part of.

##Permissions
At the next step you can set the permission for this module. 
- ACCESS_ADMIN: All users which can create, edit and delete groups and calendars and which can set other important settings get ACCESS_ADMIN for the entire module
- ACCESS_ADD: Users administrating a calendar get ACCESS_ADD for the component 'Almanach::Almanach' and the instance '::$aid'. They can create, edit and delete all dates of all groups entered in the calendar with the id aid. 
- ACCESS_EDIT: Users with the permission ACCESS_EDIT for a calendar and a group can create a date for this group and input it into the calendar. They get ACCESS_EDIT for the component 'Almanach::Almanach' and the instance '::$aid' and ACCESS_EDIT for the component 'Almanach::Group' and the instance '::$gid', too. User having ACCESS_EDIT of a group can see protected dates of the group, too. 
- ACCESS_MODERATE: User having ACCESS_MODERATE to a calendar see hidden dates. They get ACCESS_MODERATE for the component 'Almanach::Almanach' and the instance '::$aid'.
- ACCESS_COMMENT: User having ACCESS_COMMENT can create dates for themself.
- ACCESS_READ: User having ACCESS_READ can read the given calendar. They get ACCESS_READ for the component 'Almanach::Almanach' and the instance '::$aid'.

After setting the permissionrules you can create a date:

##Date
You can create a date via the 'Create new Date'- tab. If you have to input the start- and the end- date and a title for this date. You can set the location, where the date take place. In 'description', you can describe your date. You can set a group to which this date beongs to. In the list are all groups shown you have the permission to. You can set a color for this date. In 'Visibility' you can set who can see this date:
- public: Public dates can be seen by all user having the permission to a calendar.
- hidden: Hidden dates can only be seen by users having the extra permission for hidden dates.
- secret: Secret dates can only seen by the group and administrators of the calendar.
If guests are welcome you can set the hook to the last field. This will be shown especially to the other users.

Then you can select the calendars where this date is part of. You do this via the calendar-dorpdown-list and a click to 'Input this Date'. In the dropdown-list you can see all calendars where you can input this date. Calendars you dont have the permission or calendars dont having the option to input a date generelly are excluded from the list. You can set different colors to the calendars.

#Color-Ranking
This shows the ranking of the different colors. The higher color overwrites the deeper one.
1. Color given by the heredity
2. Color given to the calendar by the date
3. Color given to the date
4. Color given to the group
If there should no overwriting, the color field has to be empty.

#Google Calendar
You can connect your calendar with a google calendar. Dates input in a calendar will be input into the google calendar, too. At the beginning you can transfer your calendar to google. Dates input by google are automaticly transfered to your calendar. You can select one group and one contact person for dates get by google calendar for each calendar. Dates deleted by google will only pulled from the calendar. They will continue to exist.

##Installing Google Api
To install the api you has to get it via google and copy the "vendor" folder including the google api get by composer in the Almanach root folder. To use the api, you have to get a key by google. Put the "p12" key into the "secret" folder in the Almanach root folder. Rename the key to "google.p12". Now the google api is installed. Via google you get an email address for the api. Put this into the field in the settings mask.

##Connect to a calendar
Now edit your calendar. In the google calendar fieldset in the calendar settings you has to input the address of the google calendar. Select a Group and a contact person for dates get by google. Now you has to set the permission of the google calendar for the api client. Herefor give 'edit Event' to the api email address.
