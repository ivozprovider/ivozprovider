.. _userportal:

###########
User Portal
###########

IvozProvider provides a web portal where final users can do the following
actions:

- See all calls he or she has been involved.

- Configure call forwards:

    - To voicemail

    - To an internal extension

    - To an external number

- Enable functionalities:

    - Call waiting

    - Do Not Disturb

- See the state of his or her SIP device registration

***********
Access URLs
***********

Prior to accessing to user portal, the URL addresses must be configured (domains
in these URLs must point to any of the public IP addresses of the platform).

2 roles can perform this task:

God operator
============

In the section **Platform configuration > Brands** you can configure as many
user URLs as you wish, using the button **Portal list** of each brand.

.. note:: URLs are linked to brands and god operator may choose where to create
          one shared user portal URL for all the companies of a brand or creating
          one per company.

.. warning:: URLs MUST be HTTPS.

This section also allows setting a logo per URL, a theme and a phrase to use as
the title of user portal.

.. hint:: This allows creating corporative user portals.

Brand Operator
==============

Brand Operator can also perform this same task in order to configure the user
portal URLs of his companies.

This way, he can choose whether to configure one URL per Company (with custom
domains, logos, theme and title) or sharing a global URL for all of them.

The section to do this is **Brand configuration > Portal URLs**.

******************
Access credentials
******************

Access credentials to user portal is configured in **Company configuration >
Users** section.

Specifically:

- **Login information** block, the access of each user is enabled or disabled.

- You can set the **Password** too.

- To log in the user portal, the user must use his/her email address.

.. warning:: The **email** of each user MUST be **globally unique**.

