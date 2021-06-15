##################################
Interactive Voice Responses (IVRs)
##################################

IVRs are the most common way to make **audio menus** where the caller must
choose the destination of the call by **pressing codes** based on the locutions
instructions that will be played.

.. ivrs:

***********
IVRs
***********

IVRs support specifying actions for dialed digits, but also they can be also be used
to route any existing client extension.

IVRs have the following fields:

.. glossary::

    Name
        Descriptive name of the IVR that will be used in other sections.

    Timeout
        Time that caller has to enter the digits of the target extension.

    Max digits
        Maximum number of digits allowed in this IVR.

    Welcome locution
        This locution will be played as soon as the caller enters the IVR.

    Success locution
        In case the dialed number matches one of the IVR entries or extension
        exists in the client (and allow extensions is enabled), this locution
        will be played (usually something like 'Connecting, please wait...').

    Allow dialing extensions
        When this setting is enabled, the caller can directly press the extension
        that must previously know (or the welcome locution suggests) and the system
        will automatically connect with that extension.

    Excluded Extensions
        When Allow extensions is enabled, you can exclude some extensions to be
        directly dialed adding them to the exclusion list.

    No input process
        If the caller does not input any digit in the timeout value, the
        no input process will trigger, playing the configured locution and
        redirecting the call to another number, extension or voicemail.

    Error process
        If the dialed extension does not match any IVR entry, any client extensions
        (when allow extensions is enabled), or it matches one of the extensions in the
        excluded Extensions list, the error process will trigger, playing the configured
        locution and redirecting the call to another number, extension or voicemail.

***********
IVR Entries
***********

.. hint:: The most common usage for IVR is combining them with a welcome
   locution that says something like 'Press 1 to contact XXX, Press 2 to
   contact YYY, ..."

The process of each entry of the IVR can be defined in the following button:


In this example, the caller can dial 1, 2 or 3 (the rest will be considered as
an error and will trigger the **Error process**):


- 1: Call to the internal extension 200, created in :ref:`previous section
  <huntgroups>` that routes to hunt group *Reception*.
- 2: Call to the internal extension 101.
- 3: Route this call to the external number 676 676 676.

.. note:: Each of the IVR entries supports a locution that, if set,
   will be played instead of the IVR **success locution**. This way, you can
   configure a generic locution (like 'Connecting....') or a custom one for
   a given entry (like 'Connecting reception department, please wait...').

.. rubric:: Entries are regular expressions

You can specify IVR entries as Regular Expressions. If entry is just
a numeric value, it will be handled as a sequence of digits, otherwise it
will be handled a regular expression. This can be handy if you have the
same behaviour for a group of dialed numbers.

