CREATE TABLE "customers" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar,
  "address" text,
  "created_at" timestamp,
  "updated_at" timestamp
);

CREATE TABLE "orders" (
  "id" SERIAL PRIMARY KEY,
  "user_id" int,
  "customer_id" int,
  "status" varchar,
  "created_at" timestamp
);

CREATE TABLE "order_items" (
  "id" SERIAL PRIMARY KEY,
  "order_id" int,
  "product_id" int,
  "quantity" int
);

CREATE TABLE "products" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar,
  "price" int,
  "feature_image" varchar,
  "content" text,
  "user_id" int,
  "category_id" int,
  "created_at" timestamp,
  "updated_at" timestamp
);

CREATE TABLE "categories" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar,
  "parent_id" int,
  "created_at" timestamp,
  "updated_at" timestamp
);

CREATE TABLE "product_image" (
  "id" SERIAL PRIMARY KEY,
  "image" varchar,
  "product_id" int,
  "created_at" timestamp,
  "updated_at" timestamp
);

CREATE TABLE "tags" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar,
  "created_at" timestamp,
  "updated_at" timestamp
);

CREATE TABLE "product_tag" (
  "id" SERIAL PRIMARY KEY,
  "product_id" int,
  "tag_id" int,
  "created_at" timestamp,
  "updated_at" timestamp
);

CREATE TABLE "users" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar,
  "email" varchar,
  "password" varchar,
  "created_at" timestamp,
  "updated_at" timestamp
);

CREATE TABLE "menus" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar,
  "parent_id" int,
  "created_at" timestamp,
  "updated_at" timestamp
);

CREATE TABLE "sliders" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar,
  "description" varchar,
  "image" varchar,
  "created_at" timestamp,
  "updated_at" timestamp
);

CREATE TABLE "settings" (
  "id" SERIAL PRIMARY KEY,
  "config_key" varchar,
  "config_value" varchar,
  "created_at" timestamp,
  "updated_at" timestamp
);

ALTER TABLE "orders" ADD FOREIGN KEY ("customer_id") REFERENCES "customers" ("id");

ALTER TABLE "products" ADD FOREIGN KEY ("category_id") REFERENCES "categories" ("id");

ALTER TABLE "order_items" ADD FOREIGN KEY ("order_id") REFERENCES "orders" ("id");

ALTER TABLE "order_items" ADD FOREIGN KEY ("product_id") REFERENCES "products" ("id");

ALTER TABLE "product_image" ADD FOREIGN KEY ("product_id") REFERENCES "products" ("id");

ALTER TABLE "product_tag" ADD FOREIGN KEY ("product_id") REFERENCES "products" ("id");

ALTER TABLE "product_tag" ADD FOREIGN KEY ("tag_id") REFERENCES "tags" ("id");

ALTER TABLE "products" ADD FOREIGN KEY ("user_id") REFERENCES "users" ("id");
