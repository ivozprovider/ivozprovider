####
ACLs
####

Credentials used for web access can be used with their API corresponding level. These administrators (global, brand, client)
have full access to all endpoints of their level.

Since 2.15, it is possible to create **restricted administrators** too.

Restricted global/brand administrators
======================================

Enabling global/brand administrator **Restricted** option makes this administrator special:

- Cannot be used anymore to access web portal.

- Full API endpoint access is restricted to read-only access to those endpoints.

Privileges can be fine-tuned in *List of Administrator access privileges* subsection, where you can enable/disable
for each endpoint:

.. glossary::

    Create privilege
        Administrator with this privilege can create new items of given endpoint.

    Read privilege
        Administrator with this privilege can read existing items of given endpoint. Just watch existing items, no
        modification is allowed.

    Update privilege
        Administrator with this privilege can modify existing items of given endpoint.

    Delete privilege
        Administrator with this privilege can delete existing items of given endpoint.

.. note:: - Changing a non-rectricted administrator to restricted turns it into a read-only API-capable administrator.

          - Changing a restricted administrator to non-restricted turns it into a full access web+API capable administrator.

.. hint:: You can easily select multiple endpoints in *List of Administrator access privileges* and revoke/grant them all.

Client restricted administrators
================================

Opposed to global/brand administrators, **client restricted administrators can login into client web portal**. As a
consequence, privileges of a given client administrator apply to:

- Privileges for API integrations.
- Web access to sections and available operations in those sections.

Privileges can be fine-tuned in *List of Administrator access privileges* subsection too.

.. rubric:: Example 1: Recordings-only client administrator

To create a client administrator that only sees Recordings section:

#. Create a new restricted client administrator or turn a non-rectricted one into restricted.
#. Access to **List of Administrator access privileges**, select all endpoints and press **Revoke access**.
#. Edit *Recordings* endpoint and enable Read access.

.. rubric:: Example 2: Fax-only client administrator

To create a client administrator that only sees Fax section and can send/receive faxes:

#. Create a new restricted client administrator or turn a non-restricted one into restricted.
#. Access to **List of Administrator access privileges**, select all endpoints and press **Revoke access**.
#. Edit *Faxes* endpoint and enable Read access.
#. Edit *FaxesFiles* endpoint and enable Create/Update access.
