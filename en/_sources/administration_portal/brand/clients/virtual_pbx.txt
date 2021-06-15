***********
Virtual PBX
***********

Virtual PBX clients are designed to provide service to clients with multiple terminals
that require feature-full call flows.

.. hint:: Some fields described below may not be visible depending on enabled features.

.. glossary::

    Name
        Sets the name for this client.

    SIP domain
        DNS for this client. See :ref:`Client SIP Domain` section.

    Features
        Allow configuration of available features for this client.
        Related sections are hidden consequently and the client cannot use them.

    Billing method
        When billing feature is enabled determines when calls will be priced. See :ref:`Billing` section.

    Geographic Configuration
        General client configuration for language and timezones. Most of the settings in the section can be
        configured per user if required.

    Currency
        Chosen currency will be used in price calculation, invoices, balance movements and
        remaining money operations of this client.

    Max calls
        Limits both incoming and outgoing external calls (0 for unlimited).

    Filter by IP address
        If set, the platform will only allow calls coming from allowed IP/ranges or countries.

    GeoIP allowed countries
        If *Filter by IP address* is enabled, traffic from selected countries will be allowed.

    Max daily usage
        Limits external outbound calls when this limit is reached within a day. At midnight counters are reset and
        accounts are re-enabled.

    Email
        A notification email will be sent to given address when configured max daily usage is reached. Leave empty to
        avoid notification.

    Invoice data
        Data included in invoices created by this brand. This section also allows showing/hiding billing details to
        client's portal, such as Invoices, Rating Profiles and Price of external calls.

    Notifications
        Configure the email :ref:`notification templates` to use for this client.

    Outgoing DDI
        Selects a DDI for outgoing calls of this client, if it is no overridden in
        a lower level.

    Media relay set
        As mentioned above, media-relay can be grouped in sets to reserve capacities
        or on a geographical purpose. This section lets you assign them to clients.

    Distribute Method
        'Hash based' distributes calls hashing a parameter that is unique per
        client, 'Round robin' distributes calls equally between AS-es and
        'static' is used for debugging purposes.

    Application Server
        If 'static' *distribute method* is used, select an application server here.

    On-demand call recording
        Shown only if *Recording* feature is enabled for client, allows enabling and
        disabling on-demand call recording. If enabled, you can choose how to invoke
        and service code if needed.

    Allow Client to remove recordings
        Shown only if *Recording* feature is enabled for client, shows/hides recording
        removal button on client *Call Recordings* section.


Most of the features are self-explanatory, but **voice notification** deserves
an explanation: if you enable them, when a call fails, the user will listen a
locution explaining what occurred ("you have no permissions to place this call",
"the call cannot be billed", etc.)

Both **Distribute method** and **Application Server** are only visible for God
Administrator.

.. warning:: 'Round-robin' distribute method is reserved for huge clients
              whose calls cannot be handled in a single AS. **Use 'Hash based'
              for remaining ones**, as 'Round-robin' imposes some limitations
              to client features (no queues, no conferences).

Additional subsections
----------------------

Each entry in this table has these additional options:

- **List of authorized sources**: if *Filter by IP address* is enabled, this subsection allows adding addresses or network ranges.

.. error:: No outgoing call will be allowed if *Filter by IP address* is enabled and the corresponding list is empty.

- **List of client admins**: this subsection allows managing portal credentials for this specific client. Read :ref:`acls`
  for further explanation about restricted client administrators.

- **List of Rating profiles**: this subsection allows managing the rating profiles that will be used to bill its outgoing calls.

.. warning:: No outgoing call will be allowed for this client unless an active rating profiles that can
             bill the specific call.
