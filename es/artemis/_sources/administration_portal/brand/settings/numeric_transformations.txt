.. _transformations:

#######################
Numeric transformations
#######################

**IvozProvider** is designed to provide service **anywhere in the planet**, not
only the original country where the platform is installed.

A very important concept to achieve this goal is the numeric transformation,
that **adapts the different number format systems of the countries of the world**
defined in `E.164 <https://www.itu.int/rec/T-REC-E.164/es>`_ **to a neutral format**.

.. note:: Numeric transformation *sets* must be assigned to :ref:`Carriers`, :ref:`DDI Providers`, **Clients** and **User
          endpoints** (Users, Friends, retail accounts, residential devices, etc.) to define the way every entity talks
          with IvozProvider.

There are two different transformation scenarios:

Incoming transformations
========================

When a new call is received in IvozProvider matching a provider that has been
configured for *peering*, we must adapt the numbers that make reference to:

- Origin of the call

- Destination of the call

Depending on the country of the provider, the international numbers will have
a format or another. In this case, the spanish provider will use, for example:

- 00 + 33 + number belonging to France

- It's possible that the international numbers came without the 00 code.

- It's possible that, if the call comes from the same country that the provider,
  the number comes without the calling code (911234567 instead of 00 + 34 +
  911234567 for Spain).


For an Ukranian provider, that doesn't use the 00 as international code:

- It will use 810 + 33 + number belonging to France.

- It's possible that even part of the international code (00 in most of the
  countries of the world) the provider use specific codes as prefix.

The goal of the incoming transformation is that, no matter what numeric system
the provider uses, the number will end in a general and common format.

.. _e164:

.. important:: This common format is usually called E.164 and shows the numbers
   without international code, but with country calling code: i.e. +34911234567


Outgoing transformations
========================

In the same way the origin and destination must adapt incoming numbers, it
will be required to adapt outgoing dialed numbers to properly work with each
of the providers that will route our call.

For example, for a number with spanish number system:

- *Spanish provider*: Destination will come in E164 (+34911234567) and for this
  provider, we can remove the calling code (will understand it belongs to
  its country), so the number sent to them will be 911234567.

- *French provider*: The destination will come in E164 (+34911234567) and we must
  add the international code for France, so the number sent to them will be
  0034911234567.

.. note:: To sum up, we aim to send the origin and destination in the format the
   provider is expecting.

.. tip:: Numeric transformation uses `simple regular expressions
   <https://es.wikipedia.org/wiki/Expresi%C3%B3n_regular>`_ to describe the
   changes done to the numbers. You can find multiple tutorials on net with the
   basic regular expression format.

****************************
Add a new transformation set
****************************

IvozProvider comes with an automatic transformation rules generator that fits
with most of the countries.

In order to create a new set of transformations use **Add Numeric transformations**:

.. glossary::

   Name
      Use to reference this numeric transformation set

   Description
      Additional information for each set

   Automatic creation of rules
      If set, *Geographic Configuration* fields will be used to automatically configure the rules of the set.

   Geographic Configuration
      International Code of the country, country code, trunk prefix if any, area code if any and national subscriber
      number length

=================
Example for Spain
=================

Fulfilling Geographic Configuration with:

- International Code: 00
- Country Code: +34
- Trunk Prefix: <empty>
- Area Code: <empty>
- National number length: 9

Auto-created rules will transform the numbers for spanish providers that follow these rules:

- A spanish number: Neither international nor calling code (34).
- Not a spanish number: International code (00) and calling code (34).

Let's check this *set* to understand what transformation rule does:

.. attention:: The automatic rule generation will create 8 common rules based on
   the given parameters. This rules can be edited later to match the provider
   requirements.

Spanish incoming transformation
===============================

Displayed in blue in the previous image:

- Left called/destination

- Right callee/origin

The same rules will be applied for the origin and destination:

- The **metric** field will be used to order the rules (smaller first).

    - If a rule doesn't *match*, the next rule is evaluated.
    - If a rule *matches*, no more rules are evaluated.
    - If no rule *matches*, no change is applied.

- The **Search** field is evaluated against the number (depending of the
  transformation type it will be destination or origin).

- The **Replace** field will use the capture groups that matched the Search
  field (displayed between brackets, \1 for the first one, \2 for the second
  one, and so on) to determine how the number will end.


Spanish outgoing transformation
===============================

Following the same logic, this 2 rules make the change of the outgoing external
destination numbers.


.. attention:: **To sum up**: numeric transformation can adapt origin and
   destination numbers to E.164 for the platform, and to providers expected
   formats, based on regular expressions and metric that can be grouped in *sets*
   to be shared between multiple **Carriers**.


**********
Conclusion
**********

This is a key section that allows creating sets that will allow IvozProvider make needed numeric translations to 'talk'
with all the external entities:

- Providers (carriers and DDI Providers)

- Client endpoints (Users, Friends, Retail accounts, Residential accounts, Wholesale clients)

Those sets will:

- Convert custom external format to E.164 for internal usage.

- Convert E.164 to custom external format for external usage.

Converted SIP headers:

- Destination headers (R-URI/To/Refer-To)

- Source headers (From/RPID/PAI/Diversion)

For all these transformations `Regular Expressions <http://php.net/manual/en/reference.pcre.pattern.syntax.php>`_ knowledge
is needed, unless automatic created rules work out of the box.