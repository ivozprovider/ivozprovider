.. _notification_templates:

######################
Notification Templates
######################

Brand administrators can configure the notifications sent by IvozProvider:

- Email sent when a new voicemail is received

- Email sent when a new fax is received

- Email sent when a balance is below configured threshold

- Email sent when an automatic invoice is generated

- Email sent when scheduled CDR CSVs are generated

- Email sent when max daily usage is reached

.. hint:: When no custom notification is configured, default ones will be used

Notifications are created in two steps: Create a notification type and add contents to the notification for each
required language.

***************************
Creating a new notification
***************************

Brand administrators can create new notification templates in **Brand configuration** > **Notification templates**:

Fields are nearly self-explanatory:

.. glossary::

    Name
        Used to identify this notification template

    Type
        Determine the notification type. Each notification type has its own substitution variables available to replace
        the contents of the subject and body.

****************************
Adding Notification contents
****************************

Once the notification has been created, you can add different language contents. IvozProvider will automatically use
the proper language based on the destination:

 - For Voicemails, the user language will be used

 - For Faxes, the client language will be used.

Configurable fields of each content:

.. glossary::

    Language
        Language of the contents.

    From Name
        The from name used while sending emails (p.e. IvozProvider Voicemail Notifications)

    From Address
        The from address used while sending emails (p.e. no-reply@ivozprovider.com)

    Substitution variables
        Available variables that can be used in subject and body that will be replaced before sending the email. Each
        notification type has its own variables.

    Subject
        Subject of the email to be sent. You can include Substitution variables here.

    Body type
        Body of the mail can be both plaintext or html.

    Body
        Body of the email to be sent. You can include Substitution variables here.

.. hint:: There is no need to create all content languages. If custom notification has some languages not defined the
        default contents will be used for that notification type.


******************************
Assigning templates to clients
******************************

Once the notification has been configured for the desired languages, Brand administrator can assign it to the
client that will use it. This can be done in the Notification configuration section of each client.
If client has no notification configured, brand notifications will be used for that client instead. If brand has no
notification configured, default notifications will be used.
