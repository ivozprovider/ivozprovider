.. _users:

#####
Users
#####

The installation process creates *Alice* and *Bob* users, allowing us
to test internals calls between them without too much effort.

We skipped most of the settings in **Users** configuration that we will described
in this section.

*************
Personal data
*************

.. glossary::

    Name
        Used to identify this user in most of the screens. This is also the 
        name that will be displayed in internal calls made from this user.

    Lastname
        Most of the times this is used to complete the previous field.

    Email
        Email used to send the user's received voicemails. This is also used to 
        identify the user in their portal.

    Country code / Area code
        Defines the way the user calls and the way the numbers are presented to 
        this user.

    Language
        When a locution is played to this user, this language is used.

    Timezone
        User portal call list times will use this timezone.


**********
Login Info
**********

.. glossary::

    Active
        Allows administrators to grant or disable user's acces to the 
        :ref:`user's portal <userportal>`.

    Password
        Password used to access the :ref:`user's portal <userportal>`.

    QR Code
        If enabled, a QR code for Grandstream Wave softphone configuration 
        will be shown.

*******************
Basic Configuration
*******************


.. glossary::

    Terminal
        The available terminals created in :ref:`terminals` are listed here 
        for assignment.

    Screen Extension
        One of the available :ref:`extensions` that this user will display when 
        placing internal calls. While multiple extensions can be routed to the 
        user, only one of them will be presented when the user calls. 

    Outgoing DDI
        As described in :ref:`external_ddi`, determines the number that will 
        present when placing external outgoing calls. 

    Outgoing DDI Rules
        Manages exceptions to previous setting. Read :ref:`outgoingddi_rules` 
        for further reference.

    Call ACL
        One of the created :ref:`Call ACL <call_permissions>` groups, described 
        it the previous sections.

    Do not disturb
        When this setting is enabled, the user won't receive any call but can 
        still place calls.

    Call waiting
        Limits received calls when already handling this number of calls. Set 0 for unlimited.

    Calls from non-granted IPs
        Enable calling from non-granted IP addresses for this user. 
        It limits the number of outgoing calls to avoid toll-fraud. 
        'None' value makes outgoing calls unlimited as long as client IP 
        policy is fulfilled. Read :ref:`roadwarrior_users` for further reference.

    Multi Contact
        Same SIP credentials can be configured in multiple SIP devices. In that case, all devices ring
        simultaneously when receiving a call. Setting this toggle to 'No' limits this behaviour so that
        only latest registered SIP device rings.

    Call Rejection Method
        This setting allows configuring a behaviour on call rejection for users with several
        SIP devices (Multi Contact: yes). In such scenarios, all devices ring simultaneously and call rejection must
        choose whether rejecting call just in the device that declined or in all ringing devices.
        Default behaviour is to cancel call in all devices for 600/603 response codes and only in
        current device for 480/486. Choose whether you want to force one behaviour or another no
        matter which response code your SIP device sends on call rejection.

*********
Voicemail
*********


.. glossary::

    VoiceMail enabled
        Enables or disables the **existance** of a users voicemail.
        This only makes the voicemail available to be routed as destination of a call forwarding.

    Voicemail Locution
        If set, this locution is played as voicemail welcome message when a voicemail
        for this user is going to be recorded. This only applies for call forwards
        to voicemail.

    Email notification
        Send an email to the configured user address when a new voicemail is 
        received.

    Attach sounds:
        Attach the audio message to the sent email.

.. note:: If voicemail locution is not assigned, default locution will be used as long as
          the user has not recorded a custom message through the voicemail menu (calling to
          voicemail service code).

**************
Boss-Assistant
**************

This feature will turn the user into a boss that can only be directly call by:

- The selected assistant.

- Any origin that matches the white list.

The rest of the calls to *a boss* will be redirected to the assistant.

.. glossary::

    Is boss
        Determines if this user is a boss.

    Assistant
        Who will receive the redirected calls of this boss.

    Whitelist
        :ref:`match_lists` with origins that are allowed to call directly to
        the boss.

With the setup in the image, every call to *Alice* will be redirected to *Bob*, 
except the ones placed by *Bob* itself and those coming from any origin that matches
*Alice's friends* matchlist.

*******************
Group Configuration
*******************

As described in the sections :ref:`huntgroups` and :ref:`capture_groups`, the 
user can be part of one or more hunt groups and pickup groups.

Those groups can be configured from the sections :ref:`huntgroups` and 
:ref:`capture_groups` or the user's screen if the groups already exists. 

You can also configure the user's **hunt groups** from the icon in each user 
line of the users list. 

*****************
User Call Forward
*****************

The user's call forward can be configured with the **List of call forward settings**  button.

These are the fields and available values:

.. glossary::

    Call Type
        Determines if the forward must be applied to external, internal or any 
        type of call.

    Forward type
        When this forward must be applied:
            - Unconditional: always
            - No answer: when the call is not answered in X seconds
            - Busy: When the user is talking to someone (and call waiting is 
              disabled), when *Do not disturb* is enabled or when the user 
              rejects an incoming call.
            - Not registered: when the user SIP terminal is not registered 
              against IvozProvider.

    Target type
        What route will use the forwarded call.
            - VoiceMail
            - Number (external)
            - Extension (internal)

.. hint:: If we want to forward to other process, we can create an extension 
   routed to that object and use the target type *Extension*. 

